<?php

namespace Ostrerov\Pakage\PaymentSystems\Handlers\Stripe;

use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;
use Ostrerov\Pakage\Enums\Currency;
use Ostrerov\Pakage\PaymentSystems\DTO\MakePaymentDTO;

class CreatePaymentService
{
    /**
     * @throws ApiErrorException
     */
    public function handle(StripeClient $stripeClient, MakePaymentDTO $makePaymentDTO): string
    {
        $data = $stripeClient->paymentIntents->create([
            'amount' => $makePaymentDTO->getAmount() * 100,
            'currency' => $this->getCurrency($makePaymentDTO->getCurrency()),
            'metadata' => [
                'order_id' => $makePaymentDTO->getOrderId()
            ]
        ]);

        $result = ['id' => $data->client_secret];

        return json_encode($result, true);
    }

    private function getCurrency(Currency $currency): string
    {
        return match ($currency) {
            Currency::USD => 'usd',
            Currency::EUR => 'eur',
        };
    }
}
