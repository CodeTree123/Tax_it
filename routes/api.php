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
Route::post('password/forgot/{mobile}', [ApiController::class,'forgot']);
Route::post('send_otp', [ApiController::class, 'send_otp']);
Route::post('login_with_otp', [ApiController::class, 'login_with_otp']);
Route::post('registration', [ApiController::class, 'registration']);
Route::get('product', [ApiController::class, 'product']);
Route::get('user/{phone}', [ApiController::class, 'user']);
Route::post('logout', [ApiController::class, 'logout']);
