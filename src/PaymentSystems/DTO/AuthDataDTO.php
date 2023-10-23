<?php

namespace Ostrerov\Pakage\PaymentSystems\DTO;

class AuthDataDTO
{
    /**
     * @param string $public publishableKey|client_id|public_key
     * @param string $private secret_key|client_secret|private_key
     * @param string|null $id app_id
     * @param bool $isSandbox
     */
    public function __construct(
        protected string $public,
        protected string $private,
        protected ?string $id,
        protected bool $isSandbox = false,
    ) {
    }

    /**
     * @return string
     */
    public function getPublic(): string
    {
        return $this->public;
    }

    /**
     * @return string
     */
    public function getPrivate(): string
    {
        return $this->private;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isSandbox(): bool
    {
        return $this->isSandbox;
    }
}
