<?php

namespace Ostrerov\Pakage\PaymentSystems;

use Srmklive\PayPal\Services\PayPal;
use Stripe\StripeClient;
use Throwable;
use Ostrerov\Pakage\Enums\PaymentSystem;
use Ostrerov\Pakage\PaymentSystems\DTO\AuthDataDTO;
use Ostrerov\Pakage\PaymentSystems\Handlers\Liqpay\LiqpayHandler;
use Ostrerov\Pakage\PaymentSystems\Handlers\Paypal\PaypalHandler;
use Ostrerov\Pakage\PaymentSystems\Handlers\Stripe\StripeHandler;

class PaymentSystemFactory
{
    /**
     * @throws Throwable
     */
    public function getInstance(PaymentSystem $payments, array $configData): PaymentSystemInterface
    {
        return match ($payments) {
            PaymentSystem::PAYPAL => new PaypalHandler(
                new PayPal(),
                new AuthDataDTO(
                    $configData['paypal']['client_id'],
                    $configData['paypal']['client_secret'],
                    $configData['paypal']['app_id'],
                    $configData['paypal']['mode'],
                )
            ),
            PaymentSystem::STRIPE => new StripeHandler(new StripeClient($configData['stripe']['secret_key'])),
            PaymentSystem::LIQPAY => new LiqpayHandler(
                new AuthDataDTO(
                    $configData['liqpay']['public_key'],
                    $configData['liqpay']['private_key'],
                    null,
                )
            ),
        };
    }
}
