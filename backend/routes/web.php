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

// Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'todo', 'middleware' => 'auth'], function() {
    Route::get('/', 'TodoController@index')->name('todo.index');
    Route::get('/show/{id}', 'TodoController@show')->name('todo.show');
    Route::get('/addTitle', 'TodoController@addTitle')->name('todo.addTitle');
    Route::post('/create', 'AddTitleController@create');
    Route::get('/delete/{id?}', 'TodoController@delete');
    Route::get('/editTitle', 'TodoController@editTitle')->name('todo.editTitle');
    Route::post('/editTitle', 'EditTitleController@edit');
    Route::get('/content', 'ContentController@delete');
    Route::post('/content', 'ContentController@edit');
    Route::get('/addContent/{id?}', 'TodoController@addContent')->name('todo.addContent');
    Route::post('/addContent/{id?}', 'AddContentController@create');
});

Route::get('/', 'TopController@index');
Route::post('/create', 'TopController@create')->middleware('auth');

Auth::routes();
Route::get('/easyLogin', function() {
    return view('easyLogin');
});
Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/', function () {
    //     return view('top');
    // });
