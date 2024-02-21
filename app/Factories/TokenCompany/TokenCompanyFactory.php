<?php

namespace App\Factories\TokenCompany;

use App\Domain\UseCases\Partner\PartnerEntityInterface;
use App\Entity\PartnerEntity;
use App\Shared\ValueObjects\TokenValueObject;

class TokenCompanyFactory
{
    public function make(array $attributes = []): PartnerEntityInterface
    {
        $newAttributes = [];

        $newAttributes['id'] = $attributes['id'] ?? null;
        $newAttributes['name'] = $attributes['name'];
        $newAttributes['document'] = $attributes['document'];
        $newAttributes['token'] = (new TokenValueObject($attributes['document']))->getValue();
        $newAttributes['homologated'] = false;
        $newAttributes['date_homologated'] = null;
        $newAttributes['created_at'] = null;
        $newAttributes['updated_at'] = null;

        return new PartnerEntity($newAttributes);
    }
}
