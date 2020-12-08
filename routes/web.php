<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\RolesController;

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

// Route::get('/courses', function () {
//     return view('courses.list');
// });

// Route::get('/courses/{id}', function ($id) {
//     return view('courses.view');
// });

// list all students in a given course
Route::get('/courses/{id}/students', function($id) {
    return view('courses.students');
});

// enroll
// Route::get('/student/{student_id}/{course_id}', 'StudentsController@enroll');
// Route::post('/students/enroll', 'StudentsController@enroll');
// TODO: pass form with $student_id and $course_id
Route::post('/students/enroll', [StudentsController::class, 'enroll']);


Route::resource('courses', CoursesController::class);
Route::resource('students', StudentsController::class);
Route::resource('roles', RolesController::class);


