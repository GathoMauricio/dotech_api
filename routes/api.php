<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController as appCtrl;
use App\Http\Controllers\UserController as userCtrl;
use App\Http\Controllers\RetiroController as retiroCtrl;
use App\Http\Controllers\CuentaRetiroController as cuentaRetiroCtrl;
use App\Http\Controllers\DeptoRetiroController as deptoRetiroCtrl;
use App\Http\Controllers\CotizacionController as cotizacionCtrl;
use App\Http\Controllers\ProyectoController as proyectoCtrl;
use App\Http\Controllers\ProductoTicketController as productosTicketCtrl;
use App\Http\Controllers\SeguimientoTicketController as SeguimientoTicketCtrl;
use App\Http\Controllers\BitacoraController as bitacoraCtrl;
use App\Http\Controllers\PagoController as pagoCtrl;
use App\Http\Controllers\ClienteController as clienteCtrl;
use App\Http\Controllers\VehiculoController as vehiculoCtrl;

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
    Route::post('actualizar_estatus_cotizacion', [cotizacionCtrl::class, 'actualizarEstatus']);
    Route::post('editar_cotizacion', [cotizacionCtrl::class, 'editarCotizacion']);
    #Proyectos
    Route::get('index_proyectos', [proyectoCtrl::class, 'index']);
    Route::get('show_proyecto', [proyectoCtrl::class, 'show']);
    #Productos
    Route::get('index_productos', [productosTicketCtrl::class, 'index']);
    #Seguimiento ticket
    Route::get('index_seguimiento_ticket', [SeguimientoTicketCtrl::class, 'index']);
    Route::post('store_seguimiento_ticket', [SeguimientoTicketCtrl::class, 'store']);
    #Bitacora
    Route::get('index_bitacoras', [bitacoraCtrl::class, 'index']);
    Route::get('index_bitacoras2', [bitacoraCtrl::class, 'index2']);
    #Pagos
    Route::get('index_pagos', [pagoCtrl::class, 'index']);
    #Clientes
    Route::get('index_clientes', [clienteCtrl::class, 'index']);
    Route::get('buscar_clientes', [clienteCtrl::class, 'buscar']);
    Route::get('show_cliente', [clienteCtrl::class, 'show']);
    #Vehiculos
    Route::get('index_vehiculos', [vehiculoCtrl::class, 'index']);
    Route::get('show_vehiculos', [vehiculoCtrl::class, 'show']);
    Route::get('index_fotos_vehiculos', [vehiculoCtrl::class, 'fotos']);
    Route::get('index_mantenimientos_vehiculos', [vehiculoCtrl::class, 'mantenimientos']);
    Route::get('show_mantenimiento_vehiculo', [vehiculoCtrl::class, 'showMantenimiento']);
    Route::get('index_historias_vehiculos', [vehiculoCtrl::class, 'historias']);
    Route::get('show_historia_vehiculo', [vehiculoCtrl::class, 'showHistoria']);
    Route::get('index_verificaciones_vehiculos', [vehiculoCtrl::class, 'verificaciones']);
    Route::get('index_documentos_vehiculos', [vehiculoCtrl::class, 'documentos']);
    Route::post('store_salida_vehiculos', [vehiculoCtrl::class, 'storeSalida']);
    Route::post('store_imagen_salida_vehiculos', [vehiculoCtrl::class, 'storeImagenSalida']);
    Route::post('store_mantenimiento_vehiculos', [vehiculoCtrl::class, 'storeMantenimiento']);
    Route::post('store_imagen_mantenimiento_vehiculos', [vehiculoCtrl::class, 'storeImagenMantenimiento']);
    Route::get('tipos_mantenimientos', [vehiculoCtrl::class, 'tiposMantenimientos']);
    Route::post('store_verificacion_vehiculos', [vehiculoCtrl::class, 'storeVerificacion']);
    Route::get('index_inventario_vehiculos', [vehiculoCtrl::class, 'inventarios']);
    Route::post('store_inventario_vehiculos', [vehiculoCtrl::class, 'storeInventario']);
    Route::post('store_inventario_foto_vehiculos', [vehiculoCtrl::class, 'storeInventarioFoto']);
});
