<?php

use App\Http\Controllers\BotTelegramController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::controller(BotTelegramController::class)->group(function () {
    route::get('setWebhook', 'setWebhook');
    route::post('amsisbot/webhook', 'commandHandlerWebHook');
    route::get('tes', 'data');
});
