<?php

namespace App\Repositories\Partner;

use App\Domain\UseCases\Partner\PartnerRepositoryInterface;
use App\Models\Auth\TokenPartner;
use Illuminate\Database\Eloquent\Collection;

class PartnerRepository implements PartnerRepositoryInterface
{

    public function getPartner(string $document): null|object
    {
        return TokenPartner::query()->where('document', '=', $document)->first();
    }

    public function getAllPartners(): Collection
    {
        return TokenPartner::all();
    }

    public function create(array $data)
    {
        return TokenPartner::query()->create($data);
    }

    public function unauthorize(object $partner)
    {
        $partner->authorized = 0;
        return $partner->save();
    }

    public function authorize(object $partner)
    {
        $partner->authorized = 1;
        return $partner->save();
    }
}
