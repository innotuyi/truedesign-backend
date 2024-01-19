<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\OrderController;
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
Route::put('/update/{id}', [CategoryController::class, 'updateCategory']);


Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/product/{id}', [ProductController::class, 'singleProduct']);
Route::post('/create-product', [ProductController::class, 'createProduct']);
Route::post('update-product/{id}', [ProductController::class, 'updateProduct']);
Route::put('/update-product/{id}', [ProductController::class, 'updateCategory']);


Route::get('/printing', [FilterController::class, 'printing']);
Route::get('/designing', [FilterController::class, 'designing']);
Route::get('/branding', [FilterController::class, 'branding']);

Route::post('/create-contact', [ContactController::class, 'createContact']);
Route::get('/contacts', [ContactController::class, 'contacts']);


Route::get('/allContacts', [DashboardController::class, 'allContact']);
Route::get('/allProducts', [DashboardController::class, 'allProducts']);


Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);


Route::post('/logout', [AuthController::class, 'logout']);


Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']); // Get all jobs
    Route::get('/{id}', [OrderController::class, 'show']); // Get a specific job by ID

    Route::post('/', [OrderController::class, 'create']); // Create a new job
    Route::put('/{id}', [OrderController::class, 'update']); // Update an existing job
    Route::delete('/{id}', [OrderController::class, 'destroy']); // Delete a job
});





