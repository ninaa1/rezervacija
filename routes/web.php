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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::group(['middleware'=>'admin'], function (){


// Route::get('/movies', 'MovieController@index')->name('admin.movie.index');
// Route::get('/movie', 'MovieController@create')->name('admin.movie.create');
// Route::get('/movie/edit/{id}', 'MovieController@edit')->name('admin.movie.edit');
// Route::post('/movies', 'MovieController@store');
// Route::delete('/movie/{id}', 'MovieController@destroy');
//});


Route::group(['middleware' => 'auth'], function () {
  Route::get('screenings', 'ScreeningController@screenings')->name('screenings');
  Route::get('reservations/{screeningId}', 'ReservationController@reservations')->name('reservations');
  Route::post('/reservations', 'ReservationController@store')->name('reservations.create');
  Route::get('/reservations', 'ReservationController@userReservations')->name('user.reservations');
  Route::delete('/reservations/{id}', 'ReservationController@delete')->name('user.reservations.delete');
});

Route::group(['middleware' => 'admin'], function () {


  Route::get('admin', function () {
    return view('admin.index');
  })->name('admin');

  Route::get('/admin', 'AdminController@index')->name('admin.index');
  Route::get('/admin/users', 'AdminController@users')->name('admin.users');
  
  Route::get('/admin/reservations', 'ReservationController@index')->name('admin.reservations');
  Route::delete('/admin/reservation/{id}', 'ReservationController@destroy')->name('admin.reservations.delete');
  Route::post('/admin/reservation/{id}/paid', 'ReservationController@pay')->name('admin.reservations.pay');

  Route::post('/admin/users/update/{userId}', 'AdminController@userUpdate')->name('admin.user-update');
  Route::resource('admin/movies', 'MovieController');
  Route::resource('admin/halls', 'HallController');
  Route::resource('admin/screenings', 'ScreeningController');
  Route::resource('/admin/seats', 'SeatController');
});