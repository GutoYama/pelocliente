<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cliente;

Route::get('/', function () {
    return view('welcome');
});
