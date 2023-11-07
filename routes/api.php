<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[ApiController::class,'login']);
Route::post('login_update/{phone}',[ApiController::class,'login_update']);
Route::post('profile/update/{mobile}', [ApiController::class,'profileUpdate']);
Route::post('send_otp', [ApiController::class, 'send_otp']);
Route::post('login_with_otp', [ApiController::class, 'login_with_otp']);
Route::post('registration', [ApiController::class, 'registration']);
Route::get('currency', [ApiController::class, 'getCurrency']);
Route::get('product', [ApiController::class, 'product']);
Route::get('search', [ApiController::class, 'search']);
Route::get('user/{mobile}', [ApiController::class, 'user']);
Route::post('logout', [ApiController::class, 'logout']);
