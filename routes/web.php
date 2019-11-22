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
use App\TienNghi;
Route::get('thu', function () {
	$tiennghi = TienNghi::find(1);
	foreach ($tienghi->phong as $phong)
	{
		echo $phong->tenphong."<br>"; 
	}
});
//Dia diem


Route::get('/home','HomeController@index')->name('website.index');
Route::resource('/ctphong','ChitietphongController');
Route::resource('/location','DiaDiemController');
Route::resource('/nhanghi','NhaNghiController');
Route::resource('/phong','PhongController');
Route::resource('/tiennghi','TienNghiController');
Route::resource('/users','UsersController');
Route::resource('/datphong','DatPhongController');
Route::get('/admin','HomeAdminController@index')->name('admin.index');


Auth::routes();
Route::get('/homepage', 'HomePageController@index')->name('home');
Auth::routes();



Route::get('/homepage', 'HomePageController@index')->name('home');

