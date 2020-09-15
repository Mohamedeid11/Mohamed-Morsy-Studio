<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('Home.index');
//});

Auth::routes();

Route::get('/', 'PageController@index');

Route::get('/{session}' ,'Pagecontroller@show')->name('page.show');

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Category')->group(function (){
    Route::resource('/category' , 'CategoryController', ['except' =>['create' ,'edit']]  );
});

Route::namespace('Session')->group(function (){
    Route::resource('/session' , 'SessionController' ,  ['except' =>['edit']]);
    Route::get('/session/{session}/Gallery/{image}' , 'SessionController@delete')->name('session.delete');
});

Route::namespace('Gallery')->group(function (){
    Route::resource('/Gallery' , 'GalleryController' ,  ['except' =>['index','create' ,'edit' , 'show' , 'update' , 'destroy']]);
});

Route::namespace('Event')->group(function () {
    Route::resource('event','EventController' ,  ['except' =>['show']]);
});

Route::namespace('MainGallery')->group(function(){
    Route::resource('mainGallery' , 'MainGalleryController', ['except' =>['create' ,'edit' , 'show' , 'update']]);
});
