<?php

namespace App\Domain\UseCases\TokenCompany;

use DateTime;
use Illuminate\Support\Fluent;

interface TokenCompanyEntityInterface
{
    public function getTokenPartnerId(): int;

    public function getPartner(): object;

    public function getToken(): string;

    public function getCreatedAt(): null|DateTime;

    public function getUpdatedAt(): null|DateTime;

    public function getTokenCompany(): Fluent;

    public function getTokenData(): array;
}
