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

Route::get('/', function () {
    return redirect(\route('home'));
});
Route::get('/home/tours/search','HomeController@search')->name('home.search');
Route::get('/home/MyBookings','BookingsController@userBookings')->name('user.bookings');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/tours/{destination?}','HomeController@tours')->name('home.tours');
Route::get('/home/tourPage/{tourID}','HomeController@show')->name('tour.show');
Route::post('/home/BookTour/{tourID}','BookingsController@store')->name('Book.Tour')->middleware('auth');
Auth::routes();
Route::group(['middleware' => 'admin'], function () {

   Route::get('/dashboard','AdminController@index')->name('dashboard');

   Route::get('/addtourcompany','TourCompaniesController@create')->name('CreateTourCompany');
   Route::post('/storeTourCompany','TourCompaniesController@store')->name('company.store');
   Route::get('/company/{id}','TourCompaniesController@show')->name('company.show');
   Route::get('/company/{id}/offeredTours','TourCompaniesController@offeredTours')->name('company.tours');
   Route::patch('/companyupdate/{company:id}','TourCompaniesController@update')->name('company.update');
   Route::get('/companies/{orderByCase?}/{CompanyName?}','TourCompaniesController@index')->name('companies.index');

    Route::get('/TourPrograms','TourProgramsController@index')->name('program.index');
   Route::get('/addTourProgram','TourProgramsController@create')->name('program.create');
   Route::post('/storeTourProgram','TourProgramsController@store')->name('program.store');
   Route::get('/TourProgram/{tourID}','TourProgramsController@show')->name('program.show');
   Route::patch('/UpdateProgram/{tourID}','TourProgramsController@update')->name('program.update');
    Route::get('/TourPrograms/search','TourProgramsController@search')->name('program.search');

    Route::get('/Bookings','BookingsController@index')->name('bookings.index');
    Route::get('/Bookings/search','BookingsController@search')->name('bookings.search');
    Route::get('/TourProgram/{tourID}/BookingList','BookingsController@show')->name('bookings.show');

});
