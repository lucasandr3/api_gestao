<?php

namespace App\Domain\UseCases\Partner;

interface PartnerRepositoryInterface
{
    public function getPartner(string $document): null|object;

    public function getAllPartners();

    public function create(array $data);

    public function unauthorize(object $partner);

    public function authorize(object $partner);
}
