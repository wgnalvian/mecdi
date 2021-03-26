<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/food', [FoodController::class, 'index']);
Route::get('/food/show/{food}', [FoodController::class, 'show']);
Route::get('/food/create', [FoodController::class, 'create']);
Route::post('/food/store', [FoodController::class, 'store']);
Route::delete('/food/show/{food}', [FoodController::class, 'destroy']);
Route::put('/food/show/{food}', [FoodController::class, 'edit']);
Route::post('/food/update/{food}', [FoodController::class, 'update']);
Route::get('/ajax', [FoodController::class, 'ajax']);
Route::get('/ajax/coba', [FoodController::class, 'ajax_coba']);
Route::get('/user', [FoodController::class, 'user']);
Route::get('/user/all', [FoodController::class, 'all']);
Route::get('/user/burger', [FoodController::class, 'burger']);
Route::get('/user/pizza', [FoodController::class, 'pizza']);
Route::get('/user/drink', [FoodController::class, 'drink']);
Route::put('/user/print', [FoodController::class, 'print']);
Route::post('/user/search', [FoodController::class, 'search']);
Route::post('/user/opener', [FoodController::class, 'opener']);
Route::get('/user/input', [FoodController::class, 'input']);
Route::get('/user/order', [FoodController::class, 'order']);
Route::get('/order/done/{order}', [FoodController::class, 'done']);
Route::get('/order/delete/{order}', [FoodController::class, 'delete']);
Route::get('/user/chasier', [FoodController::class, 'chasier']);
Route::get('/user/chasier/{order}', [FoodController::class, 'ChasierPaid']);
Route::post('/user/chasier/store/{order}', [FoodController::class, 'ChasierStore'])->name('chasierStore');
Route::get('/user/chasier/destroy/{order}', [FoodController::class, 'ChasierDestroy']);
