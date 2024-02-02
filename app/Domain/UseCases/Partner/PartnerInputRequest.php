<?php

namespace App\Domain\UseCases\Partner;

use App\Shared\ValueObjects\DocumentValueObject;

class PartnerInputRequest
{
    public function __construct(private readonly array $attributes = [])
    {}

    public function getName(): string
    {
        return $this->attributes['name'] ?? '';
    }

    public function getDocument(): string
    {
        return (new DocumentValueObject($this->attributes['document'] ?? ''))->getValue();
    }
}
