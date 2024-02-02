<?php

namespace App\Domain\UseCases\Partner;

use App\Models\Auth\TokenPartner;

interface PartnerRepositoryInterface
{
    public function getPartner(string $document): null|TokenPartner;

    public function create(array $data);
}
