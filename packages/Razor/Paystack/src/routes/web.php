<?php

use Razor\Paystack\Http\Controllers\PaystackController;

Route::get('/paystack/redirect', 'PaystackController@redirect')->name('paystack.redirect');
Route::get('/paystack/callback', 'PaystackController@callback')->name('paystack.callback');
