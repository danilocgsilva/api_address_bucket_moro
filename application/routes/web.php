<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryStringController;
use App\Http\Controllers\FetchingQueryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('api', ApiController::class);
Route::resource("api.querystring", QueryStringController::class);
Route::resource("api.fetchingquerty", FetchingQueryController::class);
