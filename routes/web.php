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

// Route::get('/', function () {
//     return view('welcome');
// });

//admin
Route::get('/admin', 'App\Http\Controllers\Controller@admin'); //adminlogin
Route::post('/adminloginprocess','App\Http\Controllers\Controller@adminloginprocess'); //adminlogin process
Route::get('/admin-patients-list','App\Http\Controllers\Controller@adminpatientslist'); // all patients list
Route::get('/admin-doctors-list','App\Http\Controllers\Controller@admindoctorslist'); //all doctors list
Route::get('/adminlogout','App\Http\Controllers\Controller@adminlogout');
Route::get('/admin-deletepatient/{id}','App\Http\Controllers\Controller@admindeletepatient');
Route::get('/admin-deletedoctor/{id}','App\Http\Controllers\Controller@admindeletedoctor');
Route::get('/admin-list-appointment','App\Http\Controllers\Controller@adminlistappointment');
Route::get('/admin-delete-appointment/{id}','App\Http\Controllers\Controller@admindeleteappointment');
Route::get('/admin-crate-appointment','App\Http\Controllers\Controller@admincrateappointment');
Route::post('/admincreate-appointementprocess','App\Http\Controllers\Controller@admincreateappointementprocess');
 
Route::get('/','App\Http\Controllers\Controller@index'); //patient registration
Route::post('/registration','App\Http\Controllers\Controller@registration'); //patient registration process
Route::get('/sign-in','App\Http\Controllers\Controller@signin'); //sign in
Route::post('/signinprocess','App\Http\Controllers\Controller@signinprocess'); // sign in process
Route::get('/patient-create-appointment','App\Http\Controllers\Controller@patientcreateappointment'); //create appointment
Route::get('/logout','App\Http\Controllers\Controller@logout');
Route::post('/create-appointementprocess','App\Http\Controllers\Controller@createappointementprocess');
Route::get('/patient-appointmentlist','App\Http\Controllers\Controller@patientappointmentlist');
Route::get('/delete-patient-appointment/{id}','App\Http\Controllers\Controller@deletepatientappointment');

Route::get('/doctor-registration','App\Http\Controllers\Controller@doctorregistration'); //doctor registraion
Route::post('/doctorregistrationprocess','App\Http\Controllers\Controller@doctorregistrationprocess');
Route::get('/doctor-signin','App\Http\Controllers\Controller@doctorsignin'); // doctor sign in
Route::post('/doctorsigninprocess','App\Http\Controllers\Controller@doctorsigninprocess'); //doctor signin process
Route::get('/doctor-appointmentlist','App\Http\Controllers\Controller@doctorappointmentlist');
Route::get('/delete-doctor-appointment/{id}','App\Http\Controllers\Controller@deletedoctorappointment');
Route::get('/doctorlogout','App\Http\Controllers\Controller@doctorlogout');
Route::post('/upadatestatus','App\Http\Controllers\Controller@upadatestatus')->name('upadatestatus');

Route::get('/guest-appointment', 'App\Http\Controllers\Controller@guestappointment'); //guest appointment
Route::post('/guest-appointementprocess','App\Http\Controllers\Controller@guestappointementprocess');