<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::apiResource('books', ApiController::class);