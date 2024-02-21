<?php

namespace App\Providers\TokenCompany;

use App\Adapters\TokenCompany\TokenCompanyJsonResponse;
use App\Domain\UseCases\TokenCompany\TokenCompanyOutputInterface;
use App\Domain\UseCases\TokenCompany\TokenCompanyRepositoryInterface;
use App\Repositories\TokenCompany\TokenCompanyRepository;
use Illuminate\Support\ServiceProvider;

class TokenCompanyServiceProvider extends ServiceProvider
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
        $this->app->bind(TokenCompanyRepositoryInterface::class, TokenCompanyRepository::class);
        $this->app->bind(TokenCompanyOutputInterface::class, TokenCompanyJsonResponse::class);
    }
}
