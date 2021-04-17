<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    const ACCESS_MODULE = 'access-module';
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
//        GateContract::define(self::ACCESS_MODULE,'App\Policies\PegawaiPolicy@aksesmodule');
        GateContract::define(self::ACCESS_MODULE, 'App\Policies\PegawaiPolicy@accessModule');

        //
    }
}
