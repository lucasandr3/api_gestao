<?php

namespace App\Domain\UseCases\Partner;

use DateTime;
use Illuminate\Support\Fluent;

interface PartnerEntityInterface
{
    public function getId(): null|int;

    public function getName(): string;

    public function getDocument(): string;

    public function getToken(): string;

    public function getHomologated(): bool;

    public function getDateHomologated(): null|DateTime;

    public function getCreatedAt(): null|DateTime;

    public function getUpdatedAt(): null|DateTime;

    public function getPartner(): Fluent;

    public function getPartnerNotify(): Fluent;
}
