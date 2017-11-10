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

Route::get('/test', function () {
    
	return "I can do it !";

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//PIS
Route::get('/pisList', 'PisController@index');
Route::get('pisInfo/{userid}','PisController@pisInfo');
Route::get('/pisProfile/{userid}', 'PisController@pisProfile');
Route::post('/updatePersonalInformation','PisController@updatePersonalInformation');
Route::post('/updateFamilyBackground','PisController@updateFamilyBackground');
Route::post('/updateChildren','PisController@updateChildren');
Route::post('/updateEducationalBackground','PisController@updateEducationalBackground');

Route::get('excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'))->name('home');
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));


