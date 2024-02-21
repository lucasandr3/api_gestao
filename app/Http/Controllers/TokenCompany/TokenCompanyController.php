<?php

namespace App\Http\Controllers\TokenCompany;

use App\Domain\UseCases\TokenCompany\TokenCompanyInputRequest;
use App\Domain\UseCases\TokenCompany\TokenCompanyInteractor;
use App\Http\Controllers\Controller;
use App\Http\Requests\TokenCompany\CreateTokenCompanyRequest;
use Illuminate\Http\Request;

class TokenCompanyController extends Controller
{
    public function __construct(private readonly TokenCompanyInteractor $interactor)
    {}

    public function generateToken(CreateTokenCompanyRequest $request)
    {
        return $this->interactor->generateToken(new TokenCompanyInputRequest($request->all()));
    }
}
