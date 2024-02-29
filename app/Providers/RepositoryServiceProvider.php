<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\CustomerService;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
    }
}
