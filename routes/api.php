<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;


Route::resource("city" ,CityController::class );

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
