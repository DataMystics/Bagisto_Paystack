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

    public function getPaymentDetails($request)
    {
        $order = $request->user()->cart->order;

        $amount = $order->grand_total * 100; // Paystack accepts amount in kobo (for NGN) or pesewas (for GHS)
        $reference = uniqid();

        $data = [
            'amount' => $amount,
            'reference' => $reference,
            'email' => $request->user()->email,
            'currency' => 'GHS', // or 'GHS'
            'callback_url' => route('paystack.callback')
        ];

        $paystackUrl = "https://api.paystack.co/transaction/initialize";

        $response = $this->makeRequest('POST', $paystackUrl, $data);

        return $response->data->authorization_url;
    }

    public function verifyTransaction($request)
    {
        $reference = $request->query('reference');
        $verifyUrl = "https://api.paystack.co/transaction/verify/{$reference}";

        return $this->makeRequest('GET', $verifyUrl);
    }

    protected function makeRequest($method, $url, $data = [])
    {
        $client = new \GuzzleHttp\Client();
        $headers = [
            'Authorization' => 'Bearer ' . config('paymentmethods.paystack.secret_key'),
            'Accept' => 'application/json'
        ];

        $options = [
            'headers' => $headers
        ];

        if ($method == 'POST') {
            $options['json'] = $data;
        }

        $response = $client->request($method, $url, $options);

        return json_decode($response->getBody());
    }
}
