<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function lastAndroidVersion()
    {
        return response()->json([
            'status' => 1,
            'last_version' => '0_0_3',
            //'última_version' => env('ANDROID_VERSION'),
        ]);
    }

    public function downloadAndroidApp(Request $request)
    {
        //Download::create(['ip' => $request->ip(), 'version' => '0.0.3']);
        return response()->download(storage_path('app/public/android_app/dotech_app_0_0_3.apk'));
    }
}
