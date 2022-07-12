<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Notifications\TestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("/telegram/webhook", function (Request $request) {
    $body = \json_decode($request->getContent());
    $id = property_exists($body, 'callback_query') ? $body->callback_query->from->id : $body->message->from->id;

    Notification::route('telegram', $id)
        ->notify(new TestNotification());

    var_dump($id);
});
