<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

// <---------------------------------Admin-Panel--------------------------------->

Route::prefix('dashboard')->middleware(['guard'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('dashboard');
    Route::get('/add-post', [PostController::class, 'postPage'])->name('postPage');
    Route::post('/add-post', [PostController::class, 'addPost'])->name('addPost');
    Route::get('/delete-post/{pid}', [PostController::class, 'postDel'])->name('postDel');
    Route::get('/post-update/{pid}', [PostController::class, 'postUpdate'])->name('postUpdate');
    Route::post('/post-update/{pid}', [PostController::class, 'editPost'])->name('editPost');
});



Route::prefix('category')->middleware(['guard'])->group(function () {
Route::get('/',[CategoryController::class,'index'])->name('category');
Route::get('/add-category',[CategoryController::class,'addCategory'])->name('addCategory');
Route::get('/delete{cid}',[CategoryController::class,'DelCategory'])->name('DelCategory');
Route::get('/update{cid}',[CategoryController::class,'updateCategory'])->name('updateCategory');
Route::post('/update{cid}',[CategoryController::class,'editCategory'])->name('editCategory');
Route::post('/add-category',[CategoryController::class,'addCategoryPage'])->name('addCategoryPage');
});

Route::prefix('user')->middleware(['guard'])->group(function () {
Route::get('/',[UserController::class,'index'])->name('user');
Route::get('/add',[UserController::class,'userPage'])->name('userPage');
Route::post('/add',[UserController::class,'addUser'])->name('addUser');
Route::get('/delete{uid}',[UserController::class,'delUser'])->name('delUser');
Route::get('/update{uid}',[UserController::class,'updateUser'])->name('updateUser');
Route::post('/update{uid}',[UserController::class,'editUser'])->name('editUser');
});

Route::get('login',[AuthController::class,'index'])->name('loginPage');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::post('login',[AuthController::class,'login'])->name('login');


Route::prefix('settings')->middleware(['guard'])->group(function () {
Route::get('/',[SettingController::class,'index'])->name('settings');
Route::post('/',[SettingController::class,'insert'])->name('settingInfo');
});



// <---------------------------------User Interface/Frontend--------------------------------->

Route::get('/home',[FrontendController::class,'index'])->name('home');
Route::get('/home/read/{pid}',[FrontendController::class,'readPost'])->name('readPost');
Route::get('/home/category/{cid}',[FrontendController::class,'categorySearch'])->name('categorySearch');
