<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('finance.index'));

Route::get('/finance', function() {
    return view('finance.index');
})->name('finance.index');

Route::group(['prefix' => 'finance'], function() {
    Route::resource('accounts', AccountController::class);
});

Route::get('/test-blade', function() {
    return view('test');
});
