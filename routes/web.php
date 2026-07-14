<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;


Route::get('/', [HomeController::class, 'home']);


// floor manage
Route::get('/floors', [FloorController::class, 'viewFloors']);
Route::post('/add-floor', [FloorController::class, 'addFloor']);
Route::post('/update-floor', [FloorController::class, 'updateFloor']);
Route::get('/delete-floor/{id}', [FloorController::class, 'deleteFloor']);
Route::post('/add-rooms', [FloorController::class, 'addRooms']);
Route::post('/update-room', [FloorController::class, 'updateroom']);
Route::get('/delete-room/{id}', [FloorController::class, 'deleteroom']);

// map room
Route::get('/rooms', [MapController::class, 'view']);
Route::post('/add-map', [MapController::class, 'addMap']);
Route::get('/delete-room-map/{id}', [MapController::class, 'deleteMap']);
