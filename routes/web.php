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

Route::get('/','PagesController@index')->name('index');



Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/dashboard','DashboardController@update_avatar');

Route::get('/verify/{token}', 'VerificationController@verify')->name('verify');

Route::post('/project/store', 'ProjectController@store');

Route::post('/project/saveTheForm', 'ProjectController@saveTheForm');

Route::post('/project/updateTheForm', 'ProjectController@updateTheForm');


Route::post('/comment/store','CommentsController@store');
Route::post('/replies/store','RepliesController@store');


//Route::post('/ajaxRequest', 'ProjectController@storeBasicForm');
//Route::post('/ajaxRequest1', 'ProjectController@storeHistoryForm');
//Route::post('/ajaxRequest2', 'ProjectController@storeSoftwareForm');

Route::resource('project','ProjectController');

Route::get('/lessons/{lesson_name}','PagesController@show');

Route::get('/project/{project_id}/show','ProjectController@showToall');



Route::post('/project/update','ProjectController@updateProject');

Route::get('/projecthub','PagesController@projecthub');

Route::post('/project/{project_id}/publish','ProjectController@publish');

Route::post('/project/{project_id}/delete','ProjectController@delete');









