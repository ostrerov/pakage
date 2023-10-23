<?php

namespace Ostrerov\Pakage\PaymentSystems\Handlers\Liqpay;

use Ostrerov\Pakage\PaymentSystems\DTO\AuthDataDTO;
use Ostrerov\Pakage\PaymentSystems\DTO\MakePaymentDTO;
use Ostrerov\Pakage\PaymentSystems\DTO\PaymentInfoDTO;
use Ostrerov\Pakage\PaymentSystems\PaymentSystemInterface;

class LiqpayHandler implements PaymentSystemInterface
{
    protected Liqpay $liqpay;

    public function __construct(AuthDataDTO $authDataDTO)
    {
        $this->liqpay = new Liqpay($authDataDTO->getPublic(), $authDataDTO->getPrivate());
    }

    public function getPaymentInfo(string $paymentId): PaymentInfoDTO
    {
        return (new GetPaymentInfoService())->handle($this->liqpay, $paymentId);
    }

    public function createPayment(MakePaymentDTO $makePaymentDTO): string
    {
        return (new CreatePaymentService())->handle($this->liqpay, $makePaymentDTO);
    }
}
