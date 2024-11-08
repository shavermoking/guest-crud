<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;


Route::get('/guests', [GuestController::class, 'getGuests']);

// Получить гостя по ID
Route::get('/guest/{id}', [GuestController::class, 'getGuestById']);

Route::post('/guest', [GuestController::class, 'createGuest']);

// Обновить гостя по ID
Route::put('/guest/{id}', [GuestController::class, 'updateGuest']);

// Удалить гостя по ID
Route::delete('/guest/{id}', [GuestController::class, 'deleteGuest']);
