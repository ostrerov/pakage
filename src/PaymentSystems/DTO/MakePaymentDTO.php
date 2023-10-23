<?php

namespace Ostrerov\Pakage\PaymentSystems\DTO;

use Ostrerov\Pakage\Enums\Currency;

class MakePaymentDTO
{
    /**
     * @param float $amount
     * @param Currency $currency
     * @param string $orderId
     * @param string $description
     */
    public function __construct(
        protected float $amount,
        protected Currency $currency,
        protected string $orderId,
        protected string $description = '',
    ) {
    }

    /**
     * @return float
     */
    public function getAmount(): float
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
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
