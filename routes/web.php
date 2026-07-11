<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorController;

use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'home']);

Route::get('/Add_floor', [FloorController::class, 'add_floor']);

