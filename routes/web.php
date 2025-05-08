<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dd(123);
    return view('welcome');
});
