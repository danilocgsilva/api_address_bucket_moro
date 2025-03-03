<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryTermController;
use App\Http\Controllers\FetchingQueryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('api', ApiController::class);
Route::resource("api.querystring", QueryTermController::class);
Route::resource("api.fetchingquerty", FetchingQueryController::class);
