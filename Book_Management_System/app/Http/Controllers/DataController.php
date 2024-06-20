<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\SiteSettings;

use App\Models\UserRoll;
use App\Models\UserRollPermission;
use App\Models\User;

use App\Models\Books;
use App\Models\BookCate;
use App\Models\Member;
use App\Models\GetReturnBook;


class DataController extends Controller {
   
    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET SITE SETTINGS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getSiteSettings() {
        $data = SiteSettings::first();
        return $data;
    }

   

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUserRoll( $is_active = null ) {
        $data = UserRoll::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        if ( Auth::user()->user_roll != 1 ) {
            $data->whereNot( 'id',  1 );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL FOR EDIT USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUserRollForEdit( $id ) {
        $data = UserRoll::find( $id );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL PERMISSION FOR EDIT USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getSelectedUserRollPermission( $id ) {
        $data = UserRollPermission::where( 'user_roll_id', $id )->get()->pluck( 'permission' );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUser( $is_active = null ) {
        $data = User::with( 'userRollDetails' );
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        if ( Auth::user()->user_roll != 1 ) {
            $data->whereNot( 'user_roll',  1 );
        }
        $data = $data->get();
        return $data;
    }



    public function getCategory( ) {
        $data = BookCate::query();
      
        $data = $data->get();
        return $data;
    }

  

    public function getBook() {
        $data = Books::with('categoryDetails');
     
        $data = $data->get();
        return $data;
    }

    // member
    public function getMember() {
        $data = Member::query();
     
        $data = $data->get();
        return $data;
    }

    //get Return Book
    public function getReturnBook() {
        $data = GetReturnBook::with('bookDetails');
     
        $data = $data->get();
        return $data;
    }

    
    public function getReturnBookDetails() {
        $data = Books::query();
        $data= $data->where('stock','>',0);
        $data = $data->get();
        return $data;
    }

    public function getDashboardData(){
        $data=[];
        $data['book_stock_count']=Books::get()->sum('stock');
        $data['book_notAvailble_stock_count']=GetReturnBook::where('return_status',0)->get()->sum('no_of_book');
        $data['book_availble_stock_count']=$data['book_stock_count']-$data['book_notAvailble_stock_count'];

        return $data;
    }

  
  

}
