<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

use App\Models\SiteSettings;

use App\Models\UserRoll;
use App\Models\UserRollPermission;
use App\Models\User;
use App\Models\UserImage;

use App\Models\Books;
use App\Models\BookCate;
use App\Models\Member;
use App\Models\GetReturnBook;

class ActionController extends Controller {

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function createSiteSettings( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'site_name'     => 'required',
                'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'meta_icon'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'login_bg_image'=> 'required|image|mimes:jpeg,png,jpg',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            SiteSettings::truncate();
            DB::beginTransaction();

            $logo = uploadImage( $request->image, 'logo' );

            $meta_icon = uploadImage( $request->meta_icon, 'logo' );

            $login_bg_image = uploadImage( $request->login_bg_image, 'logo' );

            SiteSettings::create( [
                'site_name'     => $request->site_name,
                'logo'          => $logo,
                'meta_icon'     => $meta_icon,
                'login_bg_image'=> $login_bg_image,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Site Settings Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }



    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function createUserRoll( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'user_roll'     => 'required',
                // 'permission.*'     => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $permissions = $request->permission;
            array_push( $permissions, 'dashboard' );
            $user_roll = UserRoll::create( [
                'title'         => $request->user_roll,
                'is_active'     => 1,
            ] );

            foreach ( $permissions as $key => $value ) {
                UserRollPermission::create( [
                    'user_roll_id'       => $user_roll->id,
                    'permission'    => $value,
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'User Roll Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateUserRoll( Request $request, $id ) {
        try {
            // return $request;
            $validator = Validator::make( $request->all(), [
                'user_roll'         => 'required',
                'is_active'         => 'required',
                // 'permission.*'        => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $user_roll              = UserRoll::find( $id );
            $user_roll->title       = $request->user_roll;
            $user_roll->is_active   = $request->is_active;
            $user_roll->save();

            UserRollPermission::where( 'user_roll_id', $id )->delete();

            $permissions = $request->permission;
            array_push( $permissions, 'dashboard' );
            foreach ( $permissions as $key => $value ) {
                UserRollPermission::create( [
                    'user_roll_id'       => $id,
                    'permission'    => $value,
                ] );
            }

            DB::commit();
            if ( $id == Auth::user()->user_roll ) {
                $authController = new AuthController();
                return $authController->dologout();
            }
            return redirect()->route( 'user-roll' )->with( [ 'temp-success' => true, 'message' => 'User Roll Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function createUser( Request $request ) {
        try {
           
            $validator = Validator::make( $request->all(), [
                'name'      => 'required',
                'email'     => 'required',
                'user_roll'     => 'required',
               
                'password'      => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $user = User::create( [
                'name'          => $request->name,
                'email'         => $request->email,
                'user_roll'     => $request->user_roll,
                'password'      => $request->password,
            ] );

            if ( $request->image ) {

                $user_image = uploadImage( $request->image, 'user_image' );

                UserImage::create( [
                    'user_id'       => $user->id,
                  
                ] );
            }

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'User Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateUser( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'            => 'required',
                'name'          => 'required',
                'email'         => 'required',
                'user_roll'     => 'required',
                'is_active'     => 'required',
                'password'      => 'required_if:password-change,"on"',
            ],
            [
                'password.required_if' => 'The Password field is required when Password Change Check box Checked.',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $user                     = User::find( $request->id );
            $user->name       = $request->name;
            $user->email   = $request->email;
            $user->user_roll   = $request->user_roll;
            $user->is_active   = $request->is_active;
            if ( $request->password ) {
                $user->password = $request->password;
            }
            $user->save();
          

            DB::commit();
            if ( $request->id == Auth::id() && $request->password ) {
                $authController = new AuthController();
                return $authController->dologout();
            }
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'User Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

      

    public function createBookCategory( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'name'         => 'required',
               
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            BookCate::create( [
                'name'         => $request->name,
               
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Book Category Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

   

    public function updateBookCategory( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                      => 'required',
                'name'        => 'required',
                
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $category = BookCate::find( $request->id );
            $category->name = $request->name;
           
            $category->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Country Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }




    public function createBook( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'title'         => 'required',
                'author'        => 'required',
                'price'   => 'required',
                'stock'   => 'required',
                'book_category_id'   => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            Books::create( [
                'title'              => $request->title,
                'author'             => $request->author,
                'price'        => $request->price,
                'stock'        => $request->stock,
                'book_category_id'        => $request->book_category_id,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Create Book Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

  

    public function updateBook( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                    => 'required',
                'title'             => 'required',
                'author'            => 'required',
                'price'       => 'required',
                'stock'             => 'required',
                'book_category_id'             => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $book = Books::find( $request->id );
            $book->title = $request->title;
            $book->author = $request->author;
            $book->price = $request->price;
            $book->stock = $request->stock;
            $book->book_category_id = $request->book_category_id;
            $book->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Book Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //create book
    public function createMember( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'full_name'         => 'required',
                'nic'        => 'required',
                'register_date'   => 'required',
                'contact_no'   => 'required',
              
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            Member::create( [
                'full_name'              => $request->full_name,
                'nic'             => $request->nic,
                'register_date'        => $request->register_date,
                'contact_no'        => $request->contact_no,
               
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Member Registered Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //update Member
    public function updateMember( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                    => 'required',
                'full_name'             => 'required',
                'nic'            => 'required',
                'register_date'       => 'required',
                'contact_no'             => 'required',
             
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $book = Member::find( $request->id );
            $book->full_name = $request->full_name;
            $book->nic = $request->nic;
            $book->register_date = $request->register_date;
            $book->contact_no = $request->contact_no;
          
            $book->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Member Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //getReturnBook
    public function getReturnBook( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'book_title'         => 'required',
                
                'no_of_book'   => 'required',
                'get_date'   => 'required',
                'contact_no'   => 'required',
                'member'   => 'required',
               
              
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $book=Books::find($request->book_title);
            if($book->stock<$request->no_of_book){
            return redirect()->back()->with( [ 'temp-error' => true, 'message' => 'Requested quntity execded by Availble stock !' ] );

            }
            $book->stock= $book->stock-$request->no_of_book;
            $book->save();
            GetReturnBook::create( [
                'book_id'              => $request->book_title,
                 
                'no_of_book'        => $request->no_of_book,
                'get_date'        => $request->get_date,
                'contact_no'        => $request->contact_no,
                'member'        => $request->member,
                
               
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Retun/Get Book Registered Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

//updateGetReturnBook
    public function updateGetReturnBook( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'                    => 'required',
                'book_title'             => 'required',
                'no_of_book'       => 'required',
                'get_date'             => 'required',
                'contact_no'             => 'required',
                'member'             => 'required',
                'return_status'             => 'required',
            
            ] );
            
            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

          
            DB::beginTransaction();
           
            if($request->return_status==1){
                
                $book = Books::where('id',$request->book_title)->first();
                 $book->stock=$book->stock+$request->no_of_book;
                 $book->save();
             }
             
            $gerreturn = GetReturnBook::find( $request->id );
            $gerreturn->no_of_book = $request->no_of_book;
            $gerreturn->get_date = $request->get_date;
            $gerreturn->contact_no = $request->contact_no;
            $gerreturn->member = $request->member;
            $gerreturn->return_status = $request->return_status;
        
            $gerreturn->save();

            DB::commit();
            return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Get/Return Book Details Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //delete book
    public function deleteBook($id){
        GetReturnBook::where('book_id',$id)->delete();
        Books::where('id',$id)->delete();
        return redirect()->back()->with( [ 'temp-success' => true, 'message' => 'Book Deleted Successfully !' ] );

    }

  
}
