<?php

use Domain\Telegram\Actions\GenerateEndpointUrl;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/', function () {
    $ngrok_url = "https://bba8-2804-14c-5b75-8678-9777-b301-fd7a-3b39.sa.ngrok.io";
    $url = (new GenerateEndpointUrl($ngrok_url))();

    return view('welcome', compact('url'));
});
