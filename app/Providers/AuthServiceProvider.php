<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Transaction;
use App\Policies\TransactionPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Transaction::class => TransactionPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define("isAdmin", function($user){
            return $user->role == 'admin';
        });

        Gate::define("isEditor", function($user){
            return $user->role == 'editor';
        });

        Gate::define("isUser", function($user){
            return $user->role == 'user';
        });
    }
}
