<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomepageController;
use App\Http\Controllers\Api\SettingsController;

Route::get('/homepage', [HomepageController::class, 'index']);
