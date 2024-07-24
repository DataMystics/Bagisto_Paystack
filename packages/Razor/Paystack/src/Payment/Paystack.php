<?php
namespace Razor\Paystack\Payment;

use Webkul\Payment\Payment\Payment;

class Paystack extends Payment
{
    protected $code = 'paystack';

    public function getRedirectUrl()
    {
        return route('paystack.redirect');
    }
}
