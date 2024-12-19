<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Middleware\JwtMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/key', [UserController::class, "getKey"]);

Route::resource('course', CourseController::class);
Route::resource('student', StudentController::class);
Route::resource('note', NoteController::class);
Route::get('/student/getStudentsByNote/{note}', [StudentController::class, "getStudentsByNote"]);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::resource('teacher', TeacherController::class);
});