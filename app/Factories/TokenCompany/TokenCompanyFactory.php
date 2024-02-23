<?php

namespace App\Factories\TokenCompany;

use App\Domain\UseCases\TokenCompany\TokenCompanyEntityInterface;
use App\Entity\TokenCompanyEntity;
use App\Shared\ValueObjects\TokenValueObject;

class TokenCompanyFactory
{
    public function make(array $attributes = []): TokenCompanyEntityInterface
    {
        $newAttributes = [];

        $newAttributes['token_partner_id'] = $attributes['id'];
        $newAttributes['token'] = (new TokenValueObject($attributes['document']))->getValue();
        $newAttributes['created_at'] = null;
        $newAttributes['updated_at'] = null;

        return new TokenCompanyEntity($newAttributes);
    }
}
