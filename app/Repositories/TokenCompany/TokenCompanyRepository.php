<?php

namespace App\Repositories\TokenCompany;

use App\Domain\UseCases\TokenCompany\TokenCompanyRepositoryInterface;
use App\Models\Auth\TokenCompany;
use App\Models\Auth\TokenPartner;
use Illuminate\Database\Eloquent\Collection;

class TokenCompanyRepository implements TokenCompanyRepositoryInterface
{

    public function getTokenCompany(string $document): null|object
    {
        return TokenPartner::query()->where('document', '=', $document)->first();
    }

    public function generateToken($data)
    {
        return TokenCompany::query()->create($data);
    }
}
