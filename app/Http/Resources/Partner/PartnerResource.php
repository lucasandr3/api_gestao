<?php

namespace App\Http\Resources\Partner;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'document' => $this->document,
            'homologated' => $this->homologated !== 0,
            'dateHomologated' => $this->homologated === 0 ? 'Não Homologado' : Carbon::parse($this->date_homologated)->toIso8601String(),
            'authorized' => $this->authorized === 1,
            'created_at' => Carbon::parse($this->created_at)->toIso8601String(),
            'updated_at' => Carbon::parse($this->updated_at)->toIso8601String()
        ];
    }
}
