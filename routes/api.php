<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController as appCtrl;
use App\Http\Controllers\UserController as userCtrl;

Route::post('api-login', [userCtrl::class, 'apiLogin']);
Route::get('download-android-app', [appCtrl::class, 'downloadAndroidApp']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('api-datos-usuario', [userCtrl::class, 'apiDatosUsuario']);
    Route::post('api-logout', [userCtrl::class, 'apiLogout']);
    Route::post('update-fcm-token', [userCtrl::class, 'UpdateFcmToken']);
    Route::get('last_android_version', [appCtrl::class, 'lastAndroidVersion']);
});
