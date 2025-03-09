<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryTermController;
use App\Http\Controllers\QueryStringController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('api', ApiController::class);
Route::resource("api.terms", QueryTermController::class);
Route::resource("api.querystring", QueryStringController::class, [
    "except" => ["index", "edit"]
]);
