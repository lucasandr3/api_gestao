<?php

namespace App\Adapters\Partner;

use App\Domain\UseCases\Partner\PartnerOutputInterface;
use App\Http\Resources\Partner\PartnerResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PartnerJsonResponse implements PartnerOutputInterface
{

    public function partner(null|object $output): PartnerResource
    {
        return new PartnerResource($output);
    }

    public function partners($output): AnonymousResourceCollection|PartnerResource
    {
        if ($output instanceof Collection) {
            return PartnerResource::collection($output);
        }

        return new PartnerResource($output);
    }

    public function unableCreate(): JsonResponse
    {
        return response()->json(['message' => 'Erro ao criar parceiro'], 422);
    }

    public function unableUpdate(): JsonResponse
    {
        return response()->json(['message' => 'Algo deu errado, verifique os dados e tente novamente.', 'error' => true]);
    }

    public function success(): JsonResponse
    {
        return response()->json(['message' => 'Operação feita com sucesso.', 'error' => false]);
    }

    public function notFound(): JsonResponse
    {
        return response()->json(['message' => 'Parceiro não encontrado, verifique o documento informado.'], 404);
    }
}
