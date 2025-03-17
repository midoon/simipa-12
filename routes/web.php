<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
