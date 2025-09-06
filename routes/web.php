<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CKEditorController;


Route::get('/lang/{locale}', function ($lang) {
    session(['lang' => $lang]);
    return back();
});

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/category/{slug}', [FrontController::class, 'categoryPosts'])->name('categoryPosts');
Route::get('contact', [FrontController::class, 'contact'])->name('contact');
Route::get('post/{slug}', [FrontController::class, 'postDetail'])->name('postDetail');
Route::get('/search', [FrontController::class, 'search'])->name('search');
Route::post('/sendEmail', [FrontController::class, 'sendEmail'])->name('sendEmail');


Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::resource('tag', TagController::class);
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
    Route::resource('ads', AdsController::class);
});


Route::get('welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
