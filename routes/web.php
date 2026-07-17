<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\FoodBillController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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

// checkin process
Route::post('/check-in', [BookingController::class, 'checkIn']);
Route::get('/check-out/{id}', [BookingController::class, 'checkOut']);
Route::post('/add-guests', [BookingController::class, 'addGuests']);

// guest history
Route::get('/guest-history', [BookingController::class, 'guestHistory'])
    ->name('guest.history');

// Add food category
Route::post('/add-food-category', [FoodCategoryController::class, 'addFood']);
Route::get('/food-category', [FoodCategoryController::class, 'index'])
    ->name('food.category');
Route::post('/update-food-category/{id}', [FoodCategoryController::class, 'updateFoodcategory']);
Route::get('/delete-food-category/{id}', [FoodCategoryController::class, 'deleteFood']);

// food
Route::get('/foods', [FoodCategoryController::class, 'foods']);
Route::post('/add-food', [FoodCategoryController::class, 'add_Food']);
Route::post('/edit-food/{id}', [FoodCategoryController::class, 'update_Food']);
Route::get('/delete-food/{id}', [FoodCategoryController::class, 'delete_Food']);

// food order
Route::get('/food-order', [FoodOrderController::class, 'foodorder']);
Route::post('/food-order/update-status/{id}', [FoodOrderController::class, 'updateStatus'])
    ->name('food.update.status');

// complain
Route::get('/complaints', [ComplaintController::class, 'complaints']);
Route::post('/complaints-store', [ComplaintController::class, 'complaintstore']);
Route::post('/complaints/update-status/{id}', [ComplaintController::class, 'updateStatus']);
Route::delete('/complaints/delete/{id}', [ComplaintController::class, 'destroy'])->name('complaints.delete');

// Payment hotel
Route::get('/room-payment', [PaymentController::class, 'roompayment']);
Route::post('/payment/{id}/paid', [PaymentController::class, 'markPaid'])
    ->name('payment.paid');

// Payment food

// Food Bills
Route::get('/food-bills', [FoodBillController::class, 'index'])
    ->name('food.bills');

// Mark Payment Paid
Route::post('/food-bills/{id}/mark-paid', [FoodBillController::class, 'markPaid'])
    ->name('food.bill.paid');

// Mark Order Delivered
Route::post('/food-bills/{id}/mark-delivered', [FoodBillController::class, 'markDelivered'])
    ->name('food.bill.delivered');

// Delete Bill
Route::delete('/food-bills/{id}', [FoodBillController::class, 'destroy'])
    ->name('food.bill.delete');
