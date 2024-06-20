<?php

use Illuminate\Support\Facades\Route;




Route::group([
    'namespace'=>'App\Http\Controllers',

],function ($router) {

  

    Route::get('/login'                             , 'ViewController@login')->name('login');
    Route::post('/signin'                           , 'AuthController@dologin')->name('signin');

    Route::get('/logout'                            , 'AuthController@dologout')->name('logout');
});



Route::group([
    'middleware'=>['login_validation','permission_validation'],
    'namespace'=>'App\Http\Controllers',
],function ($router) {

  

  
    Route::get('/'                                  , 'ViewController@dashboard')->name('dashboard');

   
    Route::get('/site-settings'                     , 'ViewController@viewSiteSetting')->name('site-settings');



    Route::get('/user'                              , 'ViewController@userDetails')->name('user');

    Route::get('/user-roll'                         , 'ViewController@userRoll')->name('user-roll');

    Route::get('/edit-user-roll/{id?}'              , 'ViewController@editUserRoll')->name('edit-user-roll');

   


    Route::get('/add-book-category'                  , 'ViewController@addbookCategory')->name('add-book-category');

    Route::get('/create-tour'                       , 'ViewController@createTour')->name('create-tour');

    Route::get('/book'                             , 'ViewController@book')->name('book');

    Route::get('/member'                             , 'ViewController@member')->name('member');

    Route::get('/getReturn'                             , 'ViewController@getReturn')->name('getReturn');






    Route::post('/create-site-settings'             , 'ActionController@createSiteSettings')->name('create-site-settings');


    Route::post('/create-user-roll'                 , 'ActionController@createUserRoll')->name('create-user-roll');

    Route::post('/create-user'                      , 'ActionController@createUser')->name('create-user');

    Route::post('/edit-user'                        , 'ActionController@updateUser')->name('edit-user');


    


    



    Route::post('/register-book'                   , 'ActionController@createBook')->name('register-book');

    Route::post('/edit-book-register'              , 'ActionController@updateBook')->name('edit-book-register');


 

});



Route::group([
    'middleware'=>['login_validation'],
    'namespace'=>'App\Http\Controllers',
],function ($router) {

    

    Route::post('/update-user-roll/{id?}'           , 'ActionController@updateUserRoll')->name('update-user-roll');

    
  

  

    Route::post('/create-book-category'                   , 'ActionController@createBookCategory')->name('create-book-category');

    Route::post('/edit-book-category'                     , 'ActionController@updateBookCategory')->name('edit-book-category');

   
    Route::post('/add-member'                   , 'ActionController@createMember')->name('add-member');
    Route::post('/edit-member'                     , 'ActionController@updateMember')->name('edit-member');
   
   Route::post('/create-get-return-book'                   , 'ActionController@getReturnBook')->name('create-get-return-book');
   Route::post('/edit-get-return-book'                     , 'ActionController@updateGetReturnBook')->name('edit-get-return-book');
   Route::get('/deleteBook/{id?}'                     , 'ActionController@deleteBook')->name('deleteBook');
   

    Route::post('/user-email-verification'                  , 'ValidationAjax@userEmailValidation')->name('user-email-verification');

    Route::post('/update-user-email-verification'           , 'ValidationAjax@updateUserEmailValidation')->name('update-user-email-verification');

   
   

  

});
