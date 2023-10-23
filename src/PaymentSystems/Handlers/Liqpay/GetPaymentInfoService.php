<?php

namespace Ostrerov\Pakage\PaymentSystems\Handlers\Liqpay;

use Ostrerov\Pakage\Enums\Currency;
use Ostrerov\Pakage\Enums\PaymentSystem;
use Ostrerov\Pakage\Enums\Status;
use Ostrerov\Pakage\PaymentSystems\DTO\PayerDTO;
use Ostrerov\Pakage\PaymentSystems\DTO\PaymentInfoDTO;

class GetPaymentInfoService
{
    public function handle(Liqpay $liqpay, string $paymentId): PaymentInfoDTO
    {
        $response = $liqpay->api("request", [
            'action' => 'status',
            'version' => '3',
            'payment_id' => $paymentId,
        ]);
        return new PaymentInfoDTO(
            $this->getStatus($response->status),
            PaymentSystem::LIQPAY,
            $response->order_id,
            $response->transaction_id,
            $response->amount,
            $this->getCurrency($response->currency),
            (int)substr($response->create_date, 0, 10),
            new PayerDTO(
                $response->sender_card_mask2,
                null,
                null,
                $response->ip
            ),
        );
    }

    private function getStatus(string $status): Status
    {
        return match ($status) {
            'success' => Status::SUCCESS,
            default => Status::FAILED,
        };
    }

    private function getCurrency(string $status): Currency
    {
        return match ($status) {
            'USD' => Currency::USD,
            default => Currency::EUR,
        };
    }
}
