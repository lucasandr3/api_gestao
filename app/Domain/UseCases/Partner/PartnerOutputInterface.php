<?php

namespace App\Domain\UseCases\Partner;

use App\Models\Auth\TokenPartner;

interface PartnerOutputInterface
{
    public function partner(null|TokenPartner $partner);

    public function unableCreate();

    public function unableUpdate();

    public function success();
}
