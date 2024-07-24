<?php

namespace Razor\Paystack\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Razor\Paystack\Payment\Paystack;

class PaystackController extends Controller
{
    protected $paystack;

    public function __construct(Paystack $paystack)
    {
        $this->paystack = $paystack;
    }

    public function redirect(Request $request)
    {
        $paymentDetails = $this->paystack->getPaymentDetails($request);

        return view('paystack::redirect', compact('paymentDetails'));
    }

    public function callback(Request $request)
    {
        $paymentResponse = $this->paystack->verifyTransaction($request);

        if ($paymentResponse->status) {
            // Handle successful payment
            // Update order status, send confirmation email, etc.
        } else {
            // Handle payment failure
            // Redirect to payment failure page or show error message
        }

        return redirect()->route('shop.checkout.success');
    }
}

