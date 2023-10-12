<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController as appCtrl;
use App\Http\Controllers\UserController as userCtrl;
use App\Http\Controllers\RetiroController as retiroCtrl;
use App\Http\Controllers\CuentaRetiroController as cuentaRetiroCtrl;
use App\Http\Controllers\DeptoRetiroController as deptoRetiroCtrl;
use App\Http\Controllers\CotizacionController as cotizacionCtrl;
use App\Http\Controllers\ProductoTicketController as productosTicketCtrl;

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
    Route::post('actualizar_retiro', [retiroCtrl::class, 'actualizarRetiro']);
    Route::post('eliminar_retiro', [retiroCtrl::class, 'eliminarRetiro']);
    #CuentaRetiro
    Route::get('index_cuenta_retiro', [cuentaRetiroCtrl::class, 'index']);
    #DeptoRetiro
    Route::get('index_depto_retiro', [deptoRetiroCtrl::class, 'index']);
    #Cotizaciones
    Route::get('index_cotizaciones', [cotizacionCtrl::class, 'index']);
    Route::get('show_cotizacion', [cotizacionCtrl::class, 'show']);
    Route::post('enviar_cotizacion', [cotizacionCtrl::class, 'enviarCotizacion']);
    #Productos
    Route::get('index_productos', [productosTicketCtrl::class, 'index']);
});
