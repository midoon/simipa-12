<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
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
});
