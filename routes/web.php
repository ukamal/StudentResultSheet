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


Route::get('/students','studentsController@index');
Route::match(['get','post'],'/students/create','StudentsController@create');
Route::match(['get','post'],'/students/edit/{student_id}','StudentsController@editStudent');
Route::match(['get','post'],'/students/delete/{student_id}','StudentsController@deleteStudent');

//Result
Route::match(['get','post'],'/students/{student_id}/add-result','StudentsController@addResult')
    ->name('student.result.create');
Route::match(['get','post'],'/students/{student_id}/view-result','StudentsController@viewResult')
    ->name('student.result.view');


//Subject

Route::get('/subjects','subjectController@index');
Route::match(['get','post'],'/subjects/add-subject','SubjectController@addSubject');
Route::match(['get','post'],'/subjects/edit-subject/{id}','SubjectController@editSubject');
Route::match(['get','post'],'/subjects/delete-subject/{id}','SubjectController@deleteSubject');


