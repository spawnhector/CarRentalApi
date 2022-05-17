<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
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

Route::post('/login',[adminController::class,'login']);
Route::get('/vehicles',[VehicleController::class,'allVehicles']);

Route::post('/file_upload',[adminController::class,'file_upload']);
Route::post('/add_vehicles',[VehicleController::class,'addVehicles']);
Route::post('/edit_vehicles',[VehicleController::class,'editVehicles']);
Route::post('/reserve_vehicle',[BookingController::class,'reserve_vehicle']);
Route::post('/delete_vehicles',[VehicleController::class,'delete_vehicles']);
