<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('finance.index');
});

Route::get('/test-blade', function() {
    return view('test');
});
