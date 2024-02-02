<?php

namespace App\Http\Controllers\Partner;

use App\Domain\UseCases\Partner\PartnerInputRequest;
use App\Domain\UseCases\Partner\PartnerInteractor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\CreatePartnerRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function __construct(private readonly PartnerInteractor $interactor)
    {}

    public function createPartner(CreatePartnerRequest $request)
    {
        return $this->interactor->createPartner(new PartnerInputRequest($request->all()));
    }
}
