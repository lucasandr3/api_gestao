<?php

namespace App\Repositories\Partner;

use App\Domain\UseCases\Partner\PartnerRepositoryInterface;
use App\Models\Auth\TokenPartner;

class PartnerRepository implements PartnerRepositoryInterface
{

    public function getPartner(string $document): null|TokenPartner
    {
        return TokenPartner::query()->where('document', '=', $document)->first();
    }

    public function create(array $data)
    {
        return TokenPartner::query()->create($data);
    }
}
