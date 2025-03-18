<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGradeController;
use App\Http\Controllers\AdminGroupController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminSubjectController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helo', function () {
    return view('hello');
});

Route::get('/healthcheck', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'success', 'message' => 'Database connection is OK.']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Database connection failed.', 'error' => $e->getMessage()], 500);
    }
});

Route::get('/info', function () {
    return (phpinfo());
});

Route::get('/admin/login', [AdminAuthController::class, 'index']);
Route::post('/admin/login', [AdminAuthController::class, 'auth']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);

    //admin teacher
    Route::get('/admin/teacher', [AdminTeacherController::class, 'index']);
    Route::post('/admin/teacher', [AdminTeacherController::class, 'store']);
    Route::put('/admin/teacher/{teacherId}', [AdminTeacherController::class, 'update']);
    Route::delete('/admin/teacher/{teacherId}', [AdminTeacherController::class, 'destroy']);
    Route::get('/admin/teacher/template/donwload', [AdminTeacherController::class, 'downloadTemplate']);
    Route::post('/admin/teacher/upload', [AdminTeacherController::class, 'upload']);

    //admin grade
    Route::get('/admin/grade', [AdminGradeController::class, 'index']);
    Route::post('/admin/grade', [AdminGradeController::class, 'store']);
    Route::delete('/admin/grade/{kelasId}', [AdminGradeController::class, 'destroy']);
    Route::put('/admin/grade/{kelasId}', [AdminGradeController::class, 'update']);
    Route::get('/admin/grade/template/donwload', [AdminGradeController::class, 'downloadTemplate']);
    Route::post('/admin/grade/upload', [AdminGradeController::class, 'upload']);

    // admin group
    Route::post('/admin/group', [AdminGroupController::class, 'store']);
    Route::put('/admin/group/{groupId}', [AdminGroupController::class, 'update']);
    Route::delete('/admin/group/{groupId}', [AdminGroupController::class, 'destroy']);
    Route::get('/admin/group/template/donwload', [AdminGroupController::class, 'downloadTemplate']);
    Route::post('/admin/group/upload', [AdminGroupController::class, 'upload']);

    // admin student
    Route::get('/admin/student', [AdminStudentController::class, 'index']);
    Route::post('/admin/student', [AdminStudentController::class, 'store']);
    Route::delete('/admin/student/{studentId}', [AdminStudentController::class, 'destroy']);
    Route::put('/admin/student/{studentId}', [AdminStudentController::class, 'update']);
    Route::get('/admin/student/template/donwload', [AdminStudentController::class, 'downloadTemplate']);
    Route::post('/admin/student/upload', [AdminStudentController::class, 'upload']);

    //admin subject
    Route::get('/admin/subject', [AdminSubjectController::class, 'index']);
    Route::post('/admin/subject', [AdminSubjectController::class, 'store']);
    Route::delete('/admin/subject/{subjectId}', [AdminSubjectController::class, 'destroy']);
    Route::put('/admin/subject/{subjectId}', [AdminSubjectController::class, 'update']);
    Route::get('/admin/subject/template/donwload', [AdminSubjectController::class, 'downloadTemplate']);
    Route::post('/admin/subject/upload', [AdminSubjectController::class, 'upload']);
});
