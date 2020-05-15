<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;

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



Auth::routes();

Route::get('/email',function (){

        return new NewUserWelcomeMail();
});

Route::post('follow/{user}', 'FollowsController@store');


Route::post('/b', 'BookingsController@store');
Route::get('/b/{user}', 'BookingsController@show'); 
Route::post('/b/{user}/delete', 'BookingsController@delete'); 
Route::post('/b/{user}/print', 'BookingsController@print'); 

Route::get('view-pdf','PDFController@view');

Route::get('test', function () {

        $user = [
            'name' => 'Mahedi Hasan',
            'info' => 'Laravel Developer'
        ];
    
        \Mail::to('paskidelapaski@gmail.com')->send(new \App\Mail\NewMail($user));
    
        dd("success");
    
    });

Route::get('/','PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
