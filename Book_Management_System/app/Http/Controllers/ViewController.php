<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewController extends DataController
{
    /*---------------------------------------------------------------------------------------------------------------------------------------------------------- */
    /*BACK-END */
    /*---------------------------------------------------------------------------------------------------------------------------------------------------------- */

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW LOGIN
    ----------------------------------------------------------------------------------------------------------
    */

    public function login() {
        $data['site_settings'] = $this->getSiteSettings();
        return view::make( 'back-end.login',$data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW DEFAULT
    ----------------------------------------------------------------------------------------------------------
    */

    public function default( $data ) {

        $css = array(
            config( 'site-specific.google-font-css' ),
            config( 'site-specific.all-min-css' ),
            config( 'site-specific.all-min-css2' ),
            config( 'site-specific.icon-min-css' ),
            config( 'site-specific.tempusdominus-bootstrap-min-css' ),
            config( 'site-specific.icheck-bootstrap-min-css' ),
            config( 'site-specific.jqvmap-min-css' ),
            config( 'site-specific.adminlte-min-css' ),
            config( 'site-specific.OverlayScrollbars-min-css' ),
            config( 'site-specific.daterangepicker-min-css' ),
            config( 'site-specific.summernote-min-css' ),
            config( 'site-specific.sweetalert-css' ),
            config( 'site-specific.toastr-css' ),
            config( 'site-specific.select2-css' ),
            config( 'site-specific.select2-bootstrap4-css' ),
            config( 'site-specific.custom-css' ),
            config( 'site-specific.codemirror-min-css' ),
            config( 'site-specific.dropify-css' ),
        );

        $script = array(
            config( 'site-specific.jquery-min-js' ),
            config( 'site-specific.jquery-ui-min-js' ),
            config( 'site-specific.bootstrap-bundle-min-js' ),
            config( 'site-specific.Chart-min-js' ),
            // config( 'site-specific.sparkline-min-js' ),
            config( 'site-specific.jquery-vmap-min-js' ),
            config( 'site-specific.jquery-vmap-usa-min-js' ),
            config( 'site-specific.jquery-knob-min-js' ),
            config( 'site-specific.moment-min-js' ),
            config( 'site-specific.daterangepicker-min-js' ),
            config( 'site-specific.tempusdominus-bootstrap-min-js' ),
            config( 'site-specific.summernote-min-js' ),
            config( 'site-specific.jquery-overlayScrollbars-min-js' ),
            config( 'site-specific.adminlte-min-js' ),
            config( 'site-specific.sweetalert2-js' ),
            config( 'site-specific.toastr-js' ),
            config( 'site-specific.select2-js' ),
            config( 'site-specific.tooltip-core' ),
            config( 'site-specific.tooltip-dom' ),
            config( 'site-specific.jquery-validate-js' ),
            config( 'site-specific.additional-methods-js' ),
            config( 'site-specific.form-validation-init-js' ),
            config( 'site-specific.codemirror-min-js' ),
            config( 'site-specific.codemirror-htmlmixed-js' ),
            config( 'site-specific.dropify-init-js' ),
        );

        if ( isset( $data[ 'css' ] ) ) {
            $data[ 'css' ]    = array_merge( $css, $data[ 'css' ] );
        } else {
            $data[ 'css' ]    = $css;
        }
        if ( isset( $data[ 'script' ] ) ) {
            $data[ 'script' ] = array_merge( $script, $data[ 'script' ] );
        } else {
            $data[ 'script' ] = $script;
        }
        $data['site_settings'] = $this->getSiteSettings();
        return view::make( 'back-end.home', $data );
    }

    //                                                  FUNCTIONS FOR VIEW DEVELOPER TOOL

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION SITE SETTINGS
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewSiteSetting() {
        $data = [
            'title'     => 'Site Settings',
            'view'      => 'back-end.site-settings',
            'script'                => array(config('site-specific.site-settings-init-js')),

            'user_roll' => $this->getUserRoll(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW DASHBOARD
    ----------------------------------------------------------------------------------------------------------
    */

    public function dashboard() {
        $data = [
            'title' => 'Dashboard',
            'view' => 'back-end.dashboard',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.dashboard-init-js' )
                             ),
           'dashboard_data' => $this->getDashboardData(),
        ];

       // return $data['dashboard_data'];
        return $this->default( $data );
    }

  

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION USER ROLL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function userRoll() {
        $data = [
            'title'     => 'User Roll',
            'view'      => 'back-end.user-roll',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.user-roll-init-js' )
                             ),
            'user_roll' => $this->getUserRoll(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION EDIT USER ROLL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function editUserRoll($id) {
        $data = [
            'title'                 => 'Edit User Roll',
            'view'                  => 'back-end.edit-user-roll',
            'script'                => array(config('site-specific.edit-user-roll-init-js')),
            'user_roll'             => $this->getUserRollForEdit($id),
            'user_roll_permission'  => $this->getSelectedUserRollPermission($id),
        ];
        // return $data['user_roll'];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION USER DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function userDetails() {
        $data = [
            'title'     => 'User',
            'view'      => 'back-end.user',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.user-init-js' )
                             ),
            'user_roll' => $this->getUserRoll(1),
            'user'      => $this->getUser(),
        ];
        return $this->default( $data );
    }

    
    
   
  
    public function addbookCategory() {
        $data = [
            'title'             => 'Book Category',
            'view'              => 'back-end.add-book-category-details',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.book-category-init-js' )
                                        ),
            'bookCategory'           => $this->getCategory(),
        ];
        return $this->default( $data );
    }



    public function book() {
        $data = [
            'title'             => 'Books',
            'view'              => 'back-end.book',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.book-init-js' )
                                        ),

             'category'            => $this->getCategory(1),
            'books'            => $this->getBook(),
        ];
       
        return $this->default( $data );
    }

    //member
    public function member() {
        $data = [
            'title'             => 'Member',
            'view'              => 'back-end.member',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.member-init-js' )
                                        ),

            
            'member'            => $this->getMember(),
        ];
        // return $data["member"];
        return $this->default( $data );
    }

    //get Return book
    public function getReturn() {
        $data = [
            'title'             => 'Get / Return Books',
            'view'              => 'back-end.get-return-book',
            'css'               => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'            => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                            config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                            config( 'site-specific.pdfmake-min-js' ),
                                            config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                            config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                            config( 'site-specific.getReturn-init-js' )
                                        ),

            'bookList'            => $this->getBook(1),
            'getReturn'            => $this->getReturnBook(),
            'bookDetails'            => $this->getReturnBookDetails(),
        ];
        // return $data["member"];
        return $this->default( $data );
    }

 


}
