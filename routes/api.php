<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController as appCtrl;
use App\Http\Controllers\UserController as userCtrl;
use App\Http\Controllers\RetiroController as retiroCtrl;
use App\Http\Controllers\CuentaRetiroController as cuentaRetiroCtrl;
use App\Http\Controllers\DeptoRetiroController as deptoRetiroCtrl;

Route::post('api-login', [userCtrl::class, 'apiLogin']);
Route::get('download-android-app', [appCtrl::class, 'downloadAndroidApp']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    #User y App
    Route::get('api-datos-usuario', [userCtrl::class, 'apiDatosUsuario']);
    Route::post('api-logout', [userCtrl::class, 'apiLogout']);
    Route::post('update-fcm-token', [userCtrl::class, 'UpdateFcmToken']);
    Route::get('last_android_version', [appCtrl::class, 'lastAndroidVersion']);
    #*Retiro
    Route::get('index_retiro', [retiroCtrl::class, 'index']);
    Route::get('show_retiro', [retiroCtrl::class, 'show']);
    Route::post('aprobar_retiro', [retiroCtrl::class, 'aprobarRetiro']);
    Route::post('rechazar_retiro', [retiroCtrl::class, 'rechazarRetiro']);

    #CuentaRetiro
    Route::get('index_cuenta_retiro', [cuentaRetiroCtrl::class, 'index']);
    #DeptoRetiro
    Route::get('index_depto_retiro', [deptoRetiroCtrl::class, 'index']);
});
