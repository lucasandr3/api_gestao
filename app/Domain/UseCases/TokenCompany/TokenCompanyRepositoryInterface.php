<?php

namespace App\Domain\UseCases\TokenCompany;

interface TokenCompanyRepositoryInterface
{
    public function getTokenCompany(string $document): null|object;

    public function generateToken($data);
}
