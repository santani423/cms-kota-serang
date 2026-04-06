<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomepageController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\ArticleController;

Route::get('/homepage', [HomepageController::class, 'index']);
Route::get('/settings/cormenu', [SettingsController::class, 'cormenu']);
Route::get('/settings/homepage', [SettingsController::class, 'getHomepage']);
Route::get('/settings/image-homepage', [SettingsController::class, 'imageHomepage']);

// articles
Route::get('/articles/categories', [ArticleController::class, 'categories']);
