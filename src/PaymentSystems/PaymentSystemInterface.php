<?php

namespace Ostrerov\Pakage\PaymentSystems;

use Ostrerov\Pakage\PaymentSystems\DTO\MakePaymentDTO;
use Ostrerov\Pakage\PaymentSystems\DTO\PaymentInfoDTO;

interface PaymentSystemInterface
{
    public function getPaymentInfo(string $paymentId): PaymentInfoDTO;

    public function createPayment(MakePaymentDTO $makePaymentDTO): string;
}
