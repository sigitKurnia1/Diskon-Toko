<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'home']);
Route::get('/shopPage', [ItemController::class, 'shopPage']);
Route::get('/addItem', [ItemController::class, 'addItem'])->name('addItem');
Route::post('/postAddItem', [ItemController::class, 'postAddItem'])->name('postAddItem');
Route::get('/buyItem/{id}', [MainController::class, 'buyItem'])->name('buyItem');
Route::post('/postBuyItem', [MainController::class, 'postBuyItem'])->name('postBuyItem');
Route::get('/orderitems', [MainController::class, 'orderItems'])->name('orderItems');
Route::get('/faktur/{id}', [MainController::class, 'faktur'])->name('faktur');
Route::post('/orderConfirmed/{id}', [MainController::class, 'orderConfirmed'])->name('orderConfirmed');