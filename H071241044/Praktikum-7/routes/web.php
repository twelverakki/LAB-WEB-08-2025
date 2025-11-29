<?php

use App\Http\Controllers\CulinaryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/culinary', [CulinaryController::class, 'culinary']);
Route::get('/contact', [ContactController::class, 'contact']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/gallery', [GalleryController::class, 'gallery']);
Route::get('/destination', [DestinationController::class, 'destination']);
