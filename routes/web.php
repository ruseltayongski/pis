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

Route::get('logout', function(){
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});

Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','HomeController@login');
Route::match(['GET','POST'],'/register','Auth\RegisterController@register');
Route::post('userid_trapping','HomeController@userid_trapping');
Route::post('/addUserid','Auth\RegisterController@addUserid');

//PIS
Route::match(['GET','POST'],'/pisList', 'PisController@pisList');
Route::get('/pisForm', 'PisController@pisForm');
Route::get('pisInfo/{userid}','PisController@pisInfo');
Route::get('/pisProfile/{userid}', 'PisController@pisProfile');
Route::get('/pisProfile', 'PisController@pisProfile');
Route::post('/updatePersonalInformation','PisController@updatePersonalInformation');
Route::post('/updateFamilyBackground','PisController@updateFamilyBackground');
Route::post('/updateChildren','PisController@updateChildren');
Route::post('/updateEducationalBackground','PisController@updateEducationalBackground');
Route::post('/updateCivilEligibility','PisController@updateCivilEligibility');
Route::post('/updateWorkExperience','PisController@updateWorkExperience');
Route::post('/updateWorkExperience','PisController@updateWorkExperience');
Route::post('/updateVoluntaryWork','PisController@updateVoluntaryWork');
Route::post('/updateTrainingProgram','PisController@updateTrainingProgram');
Route::post('/updateOtherInformation','PisController@updateOtherInformation');
Route::post('/uploadPicture','PisController@uploadPicture');
Route::post('/deletePersonalInformation','PisController@deletePersonalInformation');

Route::get('excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'))->name('home');
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));
Route::get('sync_dts','FileController@sync_dts');

Route::get('testView',function(){
   return view('pis.testView');
});

//SALARY GRADE
Route::match(['GET','POST'],'/salaryList', 'SalaryController@salaryList');
Route::match(['GET','POST'],'/salaryForm', 'SalaryController@salaryForm');
Route::post('/salaryAdd', 'SalaryController@salaryAdd');



