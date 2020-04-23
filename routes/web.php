<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/', 'PagesController@index');
Route::get('/profile','StudentController@profile');
Route::get('profile/edit/{id}', 'StudentController@edit');
Route::post('profile/edit/{id}','StudentController@editform');

Route::get('profile/create','StudentController@create');
//Student List
Route::resource('studentlists', 'StudentlistController');

Route::resource('projects', 'ProjectController');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/status', function () {
    $comments=Comment::all();
    return view('front')->with('comments',$comments);
});

Route::get('/discussion','CommentsController@create');
Route::post('/comment','CommentsController@store');

Route::get('/upload', 'ApprovalController@form');
Route::post('/upload', 'ApprovalController@upload');

Route::get('/dash', 'CommentsController@display');

Route::resource('posts', 'PostsController');

// Supervisor
Route::prefix('supervisor')->group(function(){
    Route::get('/login','Auth\SupervisorLoginController@showLoginForm')->name('supervisor.login');
    Route::post('/login','Auth\SupervisorLoginController@login')->name('supervisor.login.submit');
    Route::get('/', 'SupervisorController@index')->name('supervisor.dashboard');
    Route::get('/logout', 'Auth\SupervisorLoginController@logout')->name('supervisor.logout');

    Route::post('/password/email', 'Auth\SupervisorForgotPasswordController@sendResetLinkEmail')->name('supervisor.password.email');
    Route::get('/password/reset', 'Auth\SupervisorForgotPasswordController@showLinkRequestForm')->name('supervisor.password.request');
    Route::post('/password/reset', 'Auth\SupervisorResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\SupervisorResetPasswordController@showResetForm')->name('supervisor.password.reset');

});
