<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Claim;
use App\Policies\UserPolicy;
use App\Policies\ClaimPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Claim::class => ClaimPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::before( fn (User $user) => $user->isSuperAdmin());

        Gate::define('superadmin', [UserPolicy::class, 'superadmin']);

        Gate::define('admin', [UserPolicy::class, 'admin']);

        Gate::define('finance', [UserPolicy::class, 'finance']);

        //Gate::define('admin', [UserPolicy::class, 'admin']);

        Gate::define('see-pendings', [UserPolicy::class, 'pending']);

        Gate::define('create-users', [UserPolicy::class, 'create']);

        Gate::define('create-claims', [ClaimPolicy::class, 'checkUser']);

        Gate::define('admin-claims', [ClaimPolicy::class, 'checkAdmin']);

        Gate::define('gestor-claims', [ClaimPolicy::class, 'checkGestor']);

        Gate::define('associate-claims', [ClaimPolicy::class, 'checkGestor']);

        Gate::define('see-fees', function(User $user){
            if($user->isAdmin() || $user->isSuperAdmin() || $user->isFinance()){
                return true;
            }
        });

    }
}
