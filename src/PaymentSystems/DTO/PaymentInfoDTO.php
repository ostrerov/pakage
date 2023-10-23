<?php

namespace Ostrerov\Pakage\PaymentSystems\DTO;

use Ostrerov\Pakage\Enums\Currency;
use Ostrerov\Pakage\Enums\PaymentSystem;
use Ostrerov\Pakage\Enums\Status;

class PaymentInfoDTO
{
    /**
     * @param Status $status
     * @param PaymentSystem $paymentSystem
     * @param string $orderId
     * @param string $paymentId
     * @param string $amount
     * @param Currency $currency
     * @param int $time
     * @param PayerDTO|null $payer
     */
    public function __construct(
        protected Status $status,
        protected PaymentSystem $paymentSystem,
        protected string $orderId,
        protected string $paymentId,
        protected string $amount,
        protected Currency $currency,
        protected int $time,
        protected ?PayerDTO $payer,
    ) {
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @return PaymentSystem
     */
    public function getPaymentSystem(): PaymentSystem
    {
        return $this->paymentSystem;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @return PayerDTO|null
     */
    public function getPayer(): ?PayerDTO
    {
        return $this->payer;
    }
}
