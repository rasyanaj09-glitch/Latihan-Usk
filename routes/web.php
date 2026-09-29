<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa;

Route::get('/', [Mahasiswa::class, 'index']);

Route::resource('mahasiswa', Mahasiswa::class);
