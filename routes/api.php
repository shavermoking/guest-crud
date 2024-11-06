<?php

use App\Models\Guest;
use Illuminate\Support\Facades\Route;

Route::get('/guests', function (){
    return Guest::all();
});
