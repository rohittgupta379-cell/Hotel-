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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\FoodCategory;



Route::middleware('auth')->group(function () {


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



    // expense
Route::get('/expense', [PaymentController::class, 'expensepayment']);
Route::get('/expenses', [PaymentController::class, 'expensepayment'])
    ->name('expenses.index');
Route::post('/expense/store', [PaymentController::class, 'store'])->name('expense.store'); 
Route::delete('/expenses/delete/{id}', [PaymentController::class, 'destroy'])
    ->name('expenses.destroy');   





     //  role
 Route::get('/role', [RoleController::class, 'roles']);
Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::put('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    


// users
Route::get('/users', [UserController::class, 'users']);
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::post('/update-user', [UserController::class, 'update'])->name('users.update');


});



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/food-order', [FoodOrderController::class, 'orderFood']);
Route::get('/food-menu',function(){
    $categories = FoodCategory::with('foods')->get();
    return view('food-menu', compact('categories'));
});