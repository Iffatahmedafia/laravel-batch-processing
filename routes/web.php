<?php
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('upload-file');
});


Route::get('/upload', [ProductController::class, 'index'])->name('index');
Route::post('/upload', [ProductController::class, 'upload']);
Route::get('/batch/{id}', [ProductController::class, 'batches'])->name('batches');
Route::get('/dashboard/{id}/{name}', [ProductController::class, 'dashboard'])->name('dashboard');

