<?php

use Illuminate\Support\Facades\Route;

Route::get('login', function () {
    return response()->json([
        'error' => 401,
        'message' => 'Unauthorized'
    ], 401);
})->name('login');
