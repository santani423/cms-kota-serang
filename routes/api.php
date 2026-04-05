<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomepageController;
use App\Http\Controllers\Api\SettingsController;

Route::get('/homepage', [HomepageController::class, 'index']);
Route::get('/settings/cormenu', [SettingsController::class, 'cormenu']);
Route::get('/settings/image-homepage', [SettingsController::class, 'imageHomepage']);
