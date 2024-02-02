<?php

namespace App\Shared\ValueObjects;

use Firebase\JWT\JWT;

class TokenValueObject
{
    public function __construct(private readonly string $document)
    {}

    public function getValue(): string
    {
        $secretKey = "APIGESTAO311208";

        $who = ['document' => $this->document];

        $token = [
            'iat' => time(),
            'data' => $who
        ];

        return JWT::encode($token, $secretKey, 'HS256');
    }
}
