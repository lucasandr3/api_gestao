<?php

namespace App\Adapters\TokenCompany;

use App\Domain\UseCases\TokenCompany\TokenCompanyOutputInterface;
use App\Http\Resources\TokenCompany\TokenCompanyResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TokenCompanyJsonResponse implements TokenCompanyOutputInterface
{

    public function tokenCompany(null|object $output): TokenCompanyResource
    {
        return new TokenCompanyResource($output);
    }

    public function tokensCompanies($output): AnonymousResourceCollection|TokenCompanyResource
    {
        if ($output instanceof Collection) {
            return TokenCompanyResource::collection($output);
        }

        return new TokenCompanyResource($output);
    }

    public function unableCreate(): JsonResponse
    {
        return response()->json(['message' => 'Erro ao criar parceiro'], 422);
    }

    public function success(): JsonResponse
    {
        return response()->json(['message' => 'Operação feita com sucesso.', 'error' => false]);
    }

    public function notFound(): JsonResponse
    {
        return response()->json(['message' => 'Parceiro não encontrado, verifique o documento informado.'], 404);
    }

    public function partnerNotFound(): JsonResponse
    {
        return response()->json(['message' => 'Parceiro não encontrado ou não está mais habilitado.']);
    }
}
