<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isPpa', function($user){
            if($user->role->code == 'ppa'){
                return true;
            }else{
                return false;
            }
        });

        Gate::define('isMdaHead', function($user){
            if($user->role->code == 'mda_head'){
                return true;
            }else{
                return false;
            }
        });

        Gate::define('isMdaMember', function($user){
            if($user->role->code == 'mda_member'){
                return true;
            }else{
                return false;
            }
        });

        Gate::define('isMdaMinistry', function($user){
            if($user->role->code == 'mda_ministry'){
                return true;
            }else{
                return false;
            }
        });
        
        Gate::define('isVendor', function($user){
            if($user->role->code == 'vendor'){
                return true;
            }else{
                return false;
            }
        });
    }
}
