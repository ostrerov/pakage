<?php

namespace Ostrerov\Pakage\PaymentSystems\DTO;

class PayerDTO
{
    /**
     * @param string $name
     * @param string|null $email
     * @param string|null $phone
     * @param string|null $ip
     */
    public function __construct(
        protected string $name,
        protected ?string $email,
        protected ?string $phone,
        protected ?string $ip,
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }
}
