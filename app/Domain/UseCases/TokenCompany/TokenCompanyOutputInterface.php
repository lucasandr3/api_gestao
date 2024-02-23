<?php

namespace App\Domain\UseCases\TokenCompany;

use App\Http\Resources\TokenCompany\TokenCompanyResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface TokenCompanyOutputInterface
{
    public function tokenCompany(null|object $output): TokenCompanyResource;

    public function tokensCompanies(null|object $output): AnonymousResourceCollection|TokenCompanyResource;

    public function unableCreate(): JsonResponse;

    public function success(): JsonResponse;

    public function notFound(): JsonResponse;

    public function partnerNotFound();
}
