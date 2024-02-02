<?php

namespace App\Adapters\Partner;

use App\Domain\UseCases\Partner\PartnerOutputInterface;
use App\Models\Auth\TokenPartner;

class PartnerJsonResponse implements PartnerOutputInterface
{

    public function partner(?TokenPartner $partner)
    {
        return response()->json($partner);
    }

    public function unableCreate()
    {
        return response()->json(['message' => 'Erro ao criar parceiro'], 422);
    }

    public function unableUpdate()
    {
        // TODO: Implement unableUpdate() method.
    }

    public function success()
    {
        // TODO: Implement success() method.
    }
}
