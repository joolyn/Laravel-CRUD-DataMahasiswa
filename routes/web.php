<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::get('/', function () {
    return view('welcome');
});

// To Mahasiswa
Route::get('/admin', [Admin::class, 'index']);
Route::post('/data-mahasiswa', [Admin::class, 'crud_data'])->name('data-mahasiswa');

