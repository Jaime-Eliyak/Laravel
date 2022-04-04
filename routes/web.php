<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function (){
    return view(view:'layouts.admin');
});

Route::get('register', [RegisterController::class,'index']);

Route::get('/login', function (){
    return view(view:'layouts.partials.login');
});

Route::post('register',[RegisterController::class,'register'])->name('register.registro');