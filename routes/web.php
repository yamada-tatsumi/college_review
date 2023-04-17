<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', function() {
    return view('reviews/select');
})->middleware('auth');  


Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/reviews/select', 'select');
    Route::get('/reviews/post', 'post');
    Route::post('/reviews', 'store')->name('reviews.store');
    Route::get('/reviews/setting', 'setting');
    /*確認用*/
    Route::get('/reviews/both', 'both');
    Route::get('/reviews/{review}', 'detail');
    Route::post('/reviews/{review}/comment', 'submit');
   ;

    
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
