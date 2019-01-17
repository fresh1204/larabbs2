<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    //用于将各种模型对应到管理它们的授权策略上
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Models\User::class => \App\Policies\UserPolicy::class,  //为用户模型 User 指定授权策略 UserPolicy 
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
