<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('subscribers', [SubscriberController::class, 'all'])->name('subscribers.all');