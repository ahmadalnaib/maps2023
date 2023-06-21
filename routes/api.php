<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Admin\Api\BoxController;
use App\Http\Controllers\Admin\Api\PlanController;
use App\Http\Controllers\Admin\Api\UserController;
use App\Http\Controllers\Admin\Api\LoginController;
use App\Http\Controllers\Admin\Api\SystemController;
use App\Http\Controllers\Admin\Api\ApiRentalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!ujhjh
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/paypal/create-payment',[PurchaseController::class,'createPayment']);
Route::post('/paypal/execute-payment',[PurchaseController::class,'executePayment']);

Route::get('/rentals', [ApiRentalController::class, 'index']);
Route::post('/rentals', [ApiRentalController::class, 'store']); 
Route::get('/rentals/system/{systemUuid}', [ApiRentalController::class, 'getBySystem']);

Route::get('/systems', [SystemController::class, 'index']);
Route::get('/systems/{id}', [SystemController::class, 'show']);


Route::get('/plans', [PlanController::class, 'index']);
Route::get('/plans/{plan}', [PlanController::class, 'show']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/email-verified', [UserController::class, 'emailVerifiedUsers']);
Route::get('/users/not-email-verified', [UserController::class, 'notEmailVerifiedUsers']);


Route::get('/boxes/{box}', [BoxController::class, 'show']);


Route::get('/login',[LoginController::class,'login']);


