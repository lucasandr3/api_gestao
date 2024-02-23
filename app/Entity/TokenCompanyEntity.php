<?php

namespace App\Entity;

use App\Domain\UseCases\Partner\PartnerEntityInterface;
use App\Domain\UseCases\TokenCompany\TokenCompanyEntityInterface;
use App\Models\Auth\TokenPartner;
use DateTime;
use Illuminate\Support\Fluent;

class TokenCompanyEntity implements TokenCompanyEntityInterface
{
    public function __construct(private $attributes)
    {}
    public function getTokenPartnerId(): int
    {
        return $this->attributes['token_partner_id'];
    }

    public function getPartner(): object
    {
        return TokenPartner::find($this->attributes['token_partner_id']);
    }

    public function getToken(): string
    {
        return $this->attributes['token'];
    }

    public function getCreatedAt(): null|DateTime
    {
        return $this->attributes['created_at'] ?? null;
    }

    public function getUpdatedAt(): null|DateTime
    {
        return $this->attributes['updated_at'] ?? null;
    }

    public function getTokenCompany(): Fluent
    {
        $partner = [
            'partner' => $this->getPartner(),
            'token' => $this->getToken(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];

        return new Fluent(array_filter($partner));
    }

    public function getTokenData(): array
    {
        return [
            'token_partner_id' => $this->getTokenPartnerId(),
            'token' => $this->getToken(),
        ];
    }
}
