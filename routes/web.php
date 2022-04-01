<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view(view:'layouts.admin');
});

Route::get('/register', function (){               //Identificador
    return view(view:'layouts.partials.register'); //Ubicacion de donde esta ubicado
});

Route::get('/login', function (){
    return view(view:'layouts.partials.login');
});

Route::get('/login', function (){
    return view(view:'layouts.partials.login');
});

Route::get('/login', function (){
    return view(view:'layouts.partials.login');
});