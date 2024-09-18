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

Route::get('logout1', function(){
    Auth::logout();
    Session::flush();
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login_jwt','HomeController@jwt');
Route::get('/flush-session-dts', 'HomeController@flushSessionDts');
  
Route::get('/','HomeController@login');
Route::match(['GET','POST'],'/new_employee','Auth\RegisterController@new_employee');

Route::post('userid_trapping','HomeController@userid_trapping');
Route::post('/addUserid','Auth\RegisterController@addUserid');

Route::get('/change/password', 'Auth\ResetPasswordController@change_password');
Route::post('/change/password', 'Auth\ResetPasswordController@save_changes');

//PIS
Route::match(['GET','POST'],'/pisList', 'PisController@pisList');
Route::get('/pisForm', 'PisController@pisForm');
Route::get('pisInfo/{userid}','PisController@pisInfo')->name('pis.info');
Route::get('/pisProfile/{userid}', 'PisController@pisProfile');
Route::get('/pisProfile', 'PisController@pisProfile');
Route::post('/updatePersonalInformation','PisController@updatePersonalInformation');
Route::post('/updateSurvey','PisController@updateSurvey');
Route::post('/updateEmployeeStatus','PisController@updateEmployeeStatus');
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
Route::get('noPicture/{type}','PisController@noPicture');
Route::post('/deletePersonalInformation','PisController@deletePersonalInformation');
Route::get('pisId/{userid}/{paper}','pisController@pisId');
Route::get('pisIdArta/{userid}/{paper}','pisController@pisIdArta');
Route::post('deleteWorkExperience','pisController@deleteWorkExperience');

//excel
Route::get('excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'))->name('home');
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));
Route::get('downloadExcelName', 'FileController@downloadExcelName');


Route::get('sync_dts','FileController@sync_dts');
Route::get('sync_dtr','FileController@sync_dtr');
Route::get('append_sched','FileController@append_sched');
Route::get('sync_personalInformation','FileController@sync_personalInformation');


//SALARY GRADE
Route::match(['GET','POST'],'/salaryList', 'SalaryController@salaryList');
Route::get('/salaryForm/{tranche}', 'SalaryController@salaryForm')->name('salary.add');
Route::match(['GET','POST'],'/salaryGrade', 'SalaryController@salaryGrade');
Route::post('/salaryAdd', 'SalaryController@salaryAdd');
Route::post('/salaryDelete', 'SalaryController@salaryDelete');
Route::get('/upgradeSalaryTranche/{currentTranche}/{upgradeTranche}', 'SalaryController@upgradeSalaryTranche');
Route::match(['GET','POST'],'salary/grade/{tranche}', 'SalaryController@salaryGradeView');

//SECTION
Route::match(['GET','POST'],'/section/filter_employee', 'SectionController@filterEmployee');

Route::get('/sirBong','PisController@sirBong');

///PDF
Route::get('pdf','PdfController@pdf');

//RESET PASSWORD
Route::get('resetPassword/{userid}',function($userid){

    \PIS\User::where('username','=',$userid)->update([
        "password" => bcrypt('123')
    ]);

    return 'Successfully Updated';
});

Route::get('CheckVersion',function(){
    return '3';
});

//REPORT
Route::get('/no_salary_grade','ReportController@no_salary_grade');

//API
Route::post('apiLogin','ApiController@login');
Route::get('apiCdo/{userid}/{offset}','ApiController@cdo');

//FILTER
Route::get('filter1/{job_status}/{gender}','HomeController@filterEmployee');
Route::get('filter2/employee_status/{employee_status}','HomeController@activeAndResigned');
Route::get('filter3/education/background/{level}','HomeController@educationLevel');
Route::get('filter4/section/{section_id}','HomeController@filterSection');

//
Route::get('phpinfo', function () {
    return \PIS\User::get();
});

Route::get('pisIdArta2024/{userid}/{paper}','pisController@pisIdArta2024');

//JO PRINT ID 2024
Route::get('pisIdArta2024JOC/{userid}/{paper}','pisController@pisIdArta2024JOC');
Route::get('/update-all-permanent-salaries', 'PisController@updateAllPermanentSalaries')->name('update.all.permanent.salaries');
