<?php
use App\Models\UserRollPermission;

function getAllPermissions() {
    return array(
        [
            'group'=>'Dashboard',
            'icon'=>'nav-icon fas fa-tachometer-alt',
            'is_dev_tool' => false,
            'type'=>'single',
            'data'=>array(
                [ 'title' => 'Dashboard', 'permission'=>'dashboard', 'show_in_sidebar'=>true ],
            )
        ],
        [
            'group'=>'Book Management',
            'icon'=>'nav-icon fa fas fa-book',
            'is_dev_tool' => false,
            'type'=>'multiple',
            'data'=>array(
               
                [ 'title' => 'Book', 'permission'=>'book', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Book', 'permission'=>'register-book', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update/Delete Book', 'permission'=>'edit-book-register', 'show_in_sidebar'=>false ],

                [ 'title' => 'Book Category', 'permission'=>'add-book-category', 'show_in_sidebar'=>true ],
                [ 'title' => 'Add Book Category', 'permission'=>'create-book-category', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Book Category', 'permission'=>'edit-book-category', 'show_in_sidebar'=>false ],

                [ 'title' => 'Get/Return Book', 'permission'=>'getReturn', 'show_in_sidebar'=>true ],
                [ 'title' => 'Add Get/Return Book', 'permission'=>'create-get-return-book', 'show_in_sidebar'=>false ],


            )
        ],
        [
            'group'=>'Member Management',
            'icon'=>'nav-icon fa far fa-address-card',
            'is_dev_tool' => false,
            'type'=>'multiple',
            'data'=>array(
               
                [ 'title' => 'Member', 'permission'=>'member', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Member', 'permission'=>'register-member', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Member', 'permission'=>'edit-member-register', 'show_in_sidebar'=>false ],
             
            )
        ],

      

       

        [
            'group'=>'Admin Tools',
            'icon'=>'nav-icon fas fa-gears',
            'is_dev_tool' => false,
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'User', 'permission'=>'user', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create User', 'permission'=>'create-user', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update User', 'permission'=>'edit-user', 'show_in_sidebar'=>false ],

                [ 'title' => 'User Roll', 'permission'=>'user-roll', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create User Roll', 'permission'=>'create-user-roll', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update User Roll', 'permission'=>'edit-user-roll', 'show_in_sidebar'=>false ],

            )
        ],
        [
            'group'=>'Developer Tools',
            'icon'=>'nav-icon fas fa-gear',
            'is_dev_tool' => true,
            'type'=>'single',
            'data'=>array(
                [ 'title' => 'Site Settings', 'permission'=>'site-settings', 'show_in_sidebar'=>true ],
                [ 'title' => 'Site Settings Update', 'permission'=>'create-site-settings', 'show_in_sidebar'=>false ],
            )
        ],
    );
}

if ( !function_exists( 'isPermissions' ) ) {
    function isPermissions( $permission ) {
        $UserPermissions = UserRollPermission::where( 'user_roll_id', Auth::user()->user_roll )->where( 'permission', $permission )->count( 'id' );
        if ( $UserPermissions == 1 ) {
            return true;
        }
        return false;
    }
}

