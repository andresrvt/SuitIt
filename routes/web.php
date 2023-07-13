<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WardrobesController;


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

// Index routes

Route::get('/', [ ClothesController::class,'showClothes'])->name('index')->middleware('auth');

Route::get('/importGeneral', [ WardrobesController::class,'importGeneralArticles'])->name('importGeneral')->middleware('auth');

//Armario routes

Route::prefix('armario')->middleware('auth')->group(function () {
    Route::get('/', [ WardrobesController::class,'showClothesWardrobe'])->name('armario');
    Route::get('/{name}', [ CategoriesController::class,'filterByCategory'])->name('filteredClothes');
});
//Login y Register routes

    Route::get('/login', function () {
        return view('auth.login');
        })->name('login')->middleware('guest');

    Route::get('/register', function () {
        return view('auth.register');
        })->name('register')->middleware('guest');

   // Account routes
Route::prefix('account')->middleware('verified')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->name('account');

    # Users profile
    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::post('/profile', [AccountController::class, 'updateProfile'])->name('profile.update');
});

// Admin routes
Route::prefix('admin')->middleware('admin')->group(function () {

    # Users
    Route::get('/users', [AdminController::class, 'indexUsers'])->name('admin.users');
    Route::get('/users/new', [AdminController::class, 'createUser'])->name('admin.users.new');
    Route::get('/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/users/edit/{id}', [AdminController::class, 'updateUser']);
    Route::post('/users/destroy/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::get('/users/disable/{id}', [AdminController::class, 'disableUser'])->name('admin.users.disable');
    Route::get('/users/restore/{id}', [AdminController::class, 'restoreUser'])->name('admin.users.restore');

    # Clothes
    Route::get('/', [AdminController::class, 'indexClothes'])->name('admin.table');
    Route::get('/clothes/edit/{id?}', [AdminController::class, 'editClothes'])->name('admin.table.edit');
    Route::post('/clothes/edit/{id?}', [AdminController::class, 'saveClothes'])->name('admin.table.save');
    Route::get('/clothes/create/{id?}', [AdminController::class, 'editClothes'])->name('admin.table.create');
    Route::post('/clothes/create/{id?}', [AdminController::class, 'saveClothes'])->name('admin.table.createSave');
    Route::delete('/clothes/destroy/{id}', [AdminController::class, 'destroyClothes'])->name('admin.table.destroy');
    Route::get('/clothes/disable/{id}', [AdminController::class, 'disableClothes'])->name('admin.table.disable');
    Route::get('/clothes/restore/{id}', [AdminController::class, 'restoreClothes'])->name('admin.table.restore');

    # Categories
    Route::get('/categories', [AdminController::class, 'indexCategories'])->name('admin.categories');
    Route::get('/categories/new', [AdminController::class, 'createCategory'])->name('admin.categories.new');
    Route::get('/categories/edit/{id}', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
    Route::post('/categories/edit/{id}', [AdminController::class, 'updateCategory']);
    Route::post('/categories/destroy/{id}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');
    Route::get('/categories/disable/{id}', [AdminController::class, 'disableCategory'])->name('admin.categories.disable');
    Route::get('/categories/restore/{id}', [AdminController::class, 'restoreCategory'])->name('admin.categories.restore');
});

Route::get('/index/{id}/{quantity}',[WardrobesController::class, 'addArticle'])->name('wardrobe.addArticle');
