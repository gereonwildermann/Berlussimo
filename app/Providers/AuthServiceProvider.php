<?php

namespace App\Providers;

use Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // The OAuth keys live in storage/ which, under a Docker bind mount on
        // Windows, is always presented with 0777 permissions (chmod is a no-op
        // on that filesystem). The keys are not web-accessible, so we skip
        // Passport's advisory 600/660 permission check rather than fail to boot.
        Passport::$validateKeyPermissions = false;

        Auth::provider('berlussimo', function ($app, $config) {
            return new BerlussimoUserProvider($app['hash'], $config['model']);
        });

    }
}
