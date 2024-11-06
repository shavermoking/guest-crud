<?php

use App\Http\Controllers\GuestController;
use App\Models\Guest;
use Illuminate\Support\Facades\Route;


Route::get('/guests', [GuestController::class, 'getGuests']);

Route::get('/guest/{id}', [GuestController::class, 'getGuestById']);
