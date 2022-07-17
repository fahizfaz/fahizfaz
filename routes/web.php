<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('post-jobs', 'JobController@postJobs');
Route::post('create-job', 'JobController@createJob');
Route::get('view-jobs', 'JobController@viewJobs');
Route::get('apply-job/{id}', 'JobController@applyJob');
Route::post('apply-job', 'JobController@applyJobPost');
Route::get('job-applications/{id}', 'JobController@jobApplication');
