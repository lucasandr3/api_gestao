<?php

namespace App\Providers\Partner;

use App\Adapters\Partner\PartnerJsonResponse;
use App\Domain\UseCases\Partner\PartnerOutputInterface;
use App\Domain\UseCases\Partner\PartnerRepositoryInterface;
use App\Repositories\Partner\PartnerRepository;
use Illuminate\Support\ServiceProvider;

class PartnerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
        $this->app->bind(PartnerOutputInterface::class, PartnerJsonResponse::class);
    }
}
