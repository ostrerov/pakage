<?php

namespace Ostrerov\Pakage\PaymentSystems\Handlers\Stripe;

use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;
use Ostrerov\Pakage\PaymentSystems\DTO\MakePaymentDTO;
use Ostrerov\Pakage\PaymentSystems\DTO\PaymentInfoDTO;
use Ostrerov\Pakage\PaymentSystems\PaymentSystemInterface;

class StripeHandler implements PaymentSystemInterface
{
    public function __construct(
        protected StripeClient $stripe
    ) {
    }

    /**
     * @throws ApiErrorException
     */
    public function getPaymentInfo(string $paymentId): PaymentInfoDTO
    {
        return (new GetPaymentInfoService())->handle($this->stripe, $paymentId);
    }

    /**
     * @throws ApiErrorException
     */
    public function createPayment(MakePaymentDTO $makePaymentDTO): string
    {
        return (new CreatePaymentService())->handle($this->stripe, $makePaymentDTO);
    }
}
