<?php

namespace Claim\Submission\Application\Providers;

use Illuminate\Support\ServiceProvider;

class ClaimSubmissionProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->mergeConfigFrom(
        //     __DIR__.'/../config/claim_submission.php',
        //     'domain-driven-laravel'
        // );
    }

    /**
     * Bootstrap any application services.
     * *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../Infrastructure/Database/migrations');
    }
}
