<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelsStickersController;
use Mahmoud\Labels\Route;

// auth routes
// Route::get('login', [LoginController::class, 'showLogin']);
// Route::post('login', [LoginController::class, 'attemptLogin']);
// Route::post('logout', [LoginController::class, 'logout']);
Route::get('test', fn () => view('test'));

Route::get('', function () {
    return redirect('/models-stickers');
});
Route::get('index', [HomeController::class, 'index']);

Route::get('models-stickers', [ModelsStickersController::class, 'index']);
Route::post('models-stickers', [ModelsStickersController::class, 'store']);
Route::post('models-stickers/delete', [ModelsStickersController::class, 'delete']);
Route::get('models-stickers/print-sticker', [ModelsStickersController::class, 'print_sticker']);