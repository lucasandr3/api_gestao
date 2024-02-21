<?php

use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\TokenCompany\TokenCompanyController;
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

Route::get('/', function () {
    return response()->json(['status' => 'OK']);
});

Route::prefix('partner')->controller(PartnerController::class)->group(function () {
    Route::post('', 'createPartner');
    Route::get('identity/{document}', 'partnerById');
    Route::get('', 'AllPartners');
    Route::put('unauthorize/{document}', 'unauthorizePartner');
    Route::put('authorize/{document}', 'authorizePartner');
});

Route::prefix('token-company')->controller(TokenCompanyController::class)->group(function () {
    Route::post('{document}', 'generateToken');
});

Route::prefix('customer')->controller(CustomerController::class)->group(function () {
    Route::post('', 'newCustomer');
});
