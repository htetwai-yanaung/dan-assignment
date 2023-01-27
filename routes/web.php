<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, 'index']);
Route::get('news/create', [NewsController::class, 'createNews']);
Route::post('news/add', [NewsController::class, 'addNews']);
Route::get('news/delete/{id}', [NewsController::class, 'deleteNews']);
Route::get('news/edit/{id}', [NewsController::class, 'editNews']);
Route::post('news/update/{id}', [NewsController::class, 'updateNews']);
