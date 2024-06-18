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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['auth']], function () {
    route::get('/home',"SuratMasukController@home");
    route::get('/suratmasuk',"SuratMasukController@suratmasuk");
    route::get('/tambahsurat',"SuratMasukController@tambah");
    // route untuk upload data
    route::post('/upload',"SuratMasukController@upload");
    // megambil data dengan ID untuk di tampilkan di DI form Edit
    route::get('/suratmasuk/edit/{id}',"SuratMasukController@edit");
    // mengedit data sesuai ID
    route::put('/update/{id}',"SuratMasukController@update");
    // mengapusdata sesuai ID 
    route::get('/delete/{id}',"SuratMasukController@delete");
    
    route::get('/logout',"AuthController@ceklogout");
    
    route::get('/edituser',"SuratMasukController@edituser");
    
    route::post('/updateuser',"SuratMasukController@updateuser");
    
});
Route::group(['middleware' => ['guest']], function () {
    // menampilkan from login 
    route::get('/',"SuratMasukController@login")->name('login');
    route::GET('/searchsurat',"SuratMasukController@searchsurat");
    route::POST('/tampilsearchsurat',"SuratMasukController@actsearchsurat");
    route::post('/ceklogin',"AuthController@ceklogin");
});

