<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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
// Route client
Route::get('/', function () {
    return view('client.home.index');
});
Route::get('/home', function () {
    return view('client.home.index');
});

Route::get('product/{category_ids', [ClientProductController::class, 'index'])->name('client.products.index');
Route::get('product-detail/{id', [ClientProductController::class, 'show'])->name('client.products.show');


Auth::routes();
// Route admin
Route::middleware('auth')->group(function(){
    
    Route::get('/dashboard', function() {
        return view('admin.dashboard.index');
    })->name('dashboard');
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});


