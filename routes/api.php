<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/category/{id}', [CategoryController::class, 'singleCategory']);
Route::post('/create', [CategoryController::class, 'createCategory']);
Route::put('/update', [CategoryController::class, 'updateCategory']);


Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/product/{id}', [ProductController::class, 'singleProduct']);
Route::post('/create-product', [ProductController::class, 'createProduct']);
Route::put('/update-product/{id}', [ProductController::class, 'updateCategory']);


