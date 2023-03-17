<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsBlogController;
use App\Http\Controllers\TagController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/tags/{id}', 'tags')->name('tags');
    Route::get('/new/{id}', 'tags')->name('tags');
    Route::get('/new/{id}','new')->name('new');
    Route::post('/','category')->name('category');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('category', CategoryController::class)->except([
        'show',
    ])->middleware('can:admin');

    Route::resource('tag', TagController::class)->except([
        'show',
    ])->middleware('can:admin');

    Route::controller(CommentController::class)->group(function () {
        Route::post('/comments/{id}', 'store')->name('comment.store');
        Route::put('/comments/{id}', 'update')->name('comment.update');
        Route::delete('/comments/{id}', 'destroy')->name('comment.destroy');
    });

    Route::resources([
        'news-blog' => NewsBlogController::class,
    ]);
});
