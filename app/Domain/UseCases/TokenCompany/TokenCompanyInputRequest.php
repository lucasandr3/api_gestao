<?php

namespace App\Domain\UseCases\TokenCompany;

use App\Shared\ValueObjects\DocumentValueObject;

class TokenCompanyInputRequest
{
    public function __construct(private readonly array $attributes = [])
    {}

    public function getDocument(): string
    {
        return (new DocumentValueObject($this->attributes['document'] ?? ''))->getValue();
    }
}
