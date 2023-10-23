<?php

namespace Ostrerov\Pakage\PaymentSystems\Handlers\Paypal;

use Srmklive\PayPal\Services\PayPal;
use Throwable;
use Ostrerov\Pakage\Enums\Currency;
use Ostrerov\Pakage\PaymentSystems\DTO\MakePaymentDTO;

class CreatePaymentService
{
    /**
     * @throws Throwable
     */
    public function handle(PayPal $payPal, MakePaymentDTO $makePaymentDTO): string
    {
        $response = $payPal->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                0 => [
                    "reference_id" => $makePaymentDTO->getOrderId(),
                    "amount" => [
                        "currency_code" => $this->getCurrency($makePaymentDTO->getCurrency()),
                        "value" => number_format($makePaymentDTO->getAmount(), 2, '.')
                    ]
                ]
            ]
        ]);

        $result = ['id' => ''];

        if (isset($response['id']) && $response['id'] != null) {
            $result = ['id' => $response['id']];
        }

        return json_encode($result, true);
    }

    private function getCurrency(Currency $currency): string
    {
        return match ($currency) {
            Currency::USD => 'USD',
            Currency::EUR => 'EUR',
        };
    }
}
