<?php

namespace App\Domain\UseCases\Partner;

use App\Models\Auth\TokenPartner;
use Illuminate\Database\Eloquent\Collection;

interface PartnerOutputInterface
{
    public function partner(null|object $output);

    public function partners($output);

    public function unableCreate();

    public function unableUpdate();

    public function success();

    public function notFound();
}
