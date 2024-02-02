<?php

namespace App\Entity;

use App\Domain\UseCases\Partner\PartnerEntityInterface;
use DateTime;
use Illuminate\Support\Fluent;

class PartnerEntity implements PartnerEntityInterface
{
    public function __construct(private $attributes)
    {}

    public function getId(): null|int
    {
        return $this->attributes['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getDocument(): string
    {
        return $this->attributes['document'];
    }

    public function getToken(): string
    {
        return $this->attributes['token'];
    }

    public function getHomologated(): bool
    {
        return $this->attributes['homologated'];
    }

    public function getDateHomologated(): null|DateTime
    {
        return $this->attributes['date_homologated'] ?? null;
    }

    public function getCreatedAt(): null|DateTime
    {
        return $this->attributes['created_at'] ?? null;
    }

    public function getUpdatedAt(): null|DateTime
    {
        return $this->attributes['updated_at'] ?? null;
    }

    public function getPartner(): Fluent
    {
        $partner = [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'document' => $this->getDocument(),
            'token' => $this->getToken(),
            'homologated' => $this->getHomologated(),
            'date_homologated' => $this->getDateHomologated(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];

        return new Fluent(array_filter($partner));
    }
}
