<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
}); 


// ======== POSTS ===========
Route::get('/post/{id}',[PostController::class,"show"])->middleware(['auth', 'verified']);
//route index
Route::get('/index', [PostController::class,"index"])->middleware(['auth', 'verified']);
 
// ========== USERS ===========
Route::get('/myprofile', [UserController::class, "show"])->middleware(['auth', 'verified'])->name("user.profile");
Route::get("/myprofile/edit", [UserController::class,"edit"])->middleware(['auth', 'verified'])->name("user.edit");
Route::patch("/myprofile/edit", [UserController::class,"update"])->middleware(['auth', 'verified'])->name("user.update");
Route::get('/users', [UserController::class,'index'])->middleware(['auth', 'verified']);

// ========== DASHBOARD ===========
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==== PROFILE EDITS, ADMIN ==========
 Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

// ===== IMAGES UPLOAD =====
Route::controller(ImageController::class)->group(function(){
    Route::get('/image-upload', 'index')->name('image.form');
    Route::post('/upload-image', 'storeImage')->name('image.store');
    Route::patch("/image-patch","update")->name("image.update");
});

require __DIR__.'/auth.php';
