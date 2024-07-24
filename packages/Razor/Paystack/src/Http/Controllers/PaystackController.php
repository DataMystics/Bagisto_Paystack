<?php

namespace Razor\Paystack\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaystackController extends Controller
{
    public function redirect(Request $request)
    {
        // Logic to handle redirection to Paystack
    }

    public function callback(Request $request)
    {
        // Logic to handle Paystack payment callback
    }
}
