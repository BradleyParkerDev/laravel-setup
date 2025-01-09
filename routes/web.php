<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $greeting = "Hello, World!";
    return view('home',['greeting' => $greeting]);
});
