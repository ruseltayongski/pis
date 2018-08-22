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
Route::match(['GET','POST'],'/new_employee','Auth\RegisterController@new_employee');

Route::post('userid_trapping','HomeController@userid_trapping');
Route::post('/addUserid','Auth\RegisterController@addUserid');

Route::get('/change/password', 'Auth\ResetPasswordController@change_password');
Route::post('/change/password', 'Auth\ResetPasswordController@save_changes');

//PIS
Route::match(['GET','POST'],'/pisList', 'PisController@pisList');
Route::get('/pisForm', 'PisController@pisForm');
Route::get('pisInfo/{userid}','PisController@pisInfo');
Route::get('/pisProfile/{userid}', 'PisController@pisProfile');
Route::get('/pisProfile', 'PisController@pisProfile');
Route::post('/updatePersonalInformation','PisController@updatePersonalInformation');
Route::post('/updateUserid','PisController@updateUserid');
Route::post('/updateFamilyBackground','PisController@updateFamilyBackground');
Route::post('/updateChildren','PisController@updateChildren');
Route::post('deleteChildren','pisController@deleteChildren');
Route::post('/updateEducationalBackground','PisController@updateEducationalBackground');
Route::post('/updateCivilEligibility','PisController@updateCivilEligibility');
Route::post('deleteCivilEligibility','pisController@deleteCivilEligibility');
Route::post('deleteEducationalBackground','pisController@deleteEducationalBackground');
Route::post('deleteOtherInformation','pisController@deleteOtherInformation');
Route::post('/updateWorkExperience','PisController@updateWorkExperience');
Route::post('/updateVoluntaryWork','PisController@updateVoluntaryWork');
Route::post('deleteVoluntaryWork','pisController@deleteVoluntaryWork');
Route::post('/updateTrainingProgram','PisController@updateTrainingProgram');
Route::post('deleteTrainingProgram','pisController@deleteTrainingProgram');
Route::post('/updateOtherInformation','PisController@updateOtherInformation');
Route::post('/uploadPicture','PisController@uploadPicture');
Route::post('/uploadSignature','PisController@uploadSignature');
Route::post('/uploadCertificate','PisController@uploadCertificate');
Route::post('/deletePersonalInformation','PisController@deletePersonalInformation');
Route::get('pisId/{userid}/{paper}','pisController@pisId');
Route::post('deleteWorkExperience','pisController@deleteWorkExperience');

Route::get('excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'))->name('home');
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));
Route::get('sync_dts','FileController@sync_dts');
Route::get('sync_dtr','FileController@sync_dtr');
Route::get('append_sched','FileController@append_sched');
Route::get('sync_personalInformation','FileController@sync_personalInformation');

//SALARY GRADE
Route::match(['GET','POST'],'/salaryList', 'SalaryController@salaryList');
Route::match(['GET','POST'],'/salaryForm', 'SalaryController@salaryForm');
Route::match(['GET','POST'],'/salaryGrade', 'SalaryController@salaryGrade');
Route::post('/salaryAdd', 'SalaryController@salaryAdd');
Route::post('/salaryDelete', 'SalaryController@salaryDelete');

Route::get('/sirBong','PisController@sirBong');

///PDF
Route::get('pdf','PdfController@pdf');

//RESET PASSWORD
Route::get('ResetPassword',function(){

    \PIS\User::where('username','=',"201800276")->update([
        "password" => bcrypt('123')
    ]);

    return 'Successfully Updated';
});

Route::get('CheckVersion',function(){
    return '3';
});

//REPORT
Route::get('/no_salary_grade','ReportController@no_salary_grade');


