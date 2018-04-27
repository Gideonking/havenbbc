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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::get('/contact', 'PagesController@contact');

//user defined methods
Route::put('/galleries/photos/{gallery}', 'GalleriesController@updateMany')->name('galleries.updatemany');

//resources

Route::resource('events','EventsController');
Route::resource('ministries','MinistriesController');
Route::resource('galleries','GalleriesController');
Route::resource('photos','PhotosController');
Route::resource('feedbacks','FeedbacksController');
Route::resource('blog','BlogPostsController');
Route::resource('positions','PositionsController');
Route::resource('leaders','LeadersController');
Route::resource('slides','SlidesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//additional routes for positions
Route::get('/positions/create/{ministry_id}', 'PositionsController@create')->name('positions');

Route::get('/positions/create/', 'PositionsController@index')->name('positions');

Route::get('/positions/{id}/assign', 'PositionsController@addAssignment')->name('positions');

Route::post('/positions/assign', 'PositionsController@assignLeader')->name('positions');

Route::delete('/positions/assign/{id}', 'PositionsController@clearLeader')->name('positions');

Route::get('/positions/assign/{id}/edit', 'PositionsController@editAssignment')->name('positions');

Route::put('/positions/assign/{id}', 'PositionsController@updateLeader')->name('positions');
// routes for positions end here
//additional routes for leaders
Route::post('leaders/unassign','LeadersController@unassign');

//additional routes for leaders ends here