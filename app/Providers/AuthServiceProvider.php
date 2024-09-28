<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        foreach(config("permission")["permission"] as $permission){
            Gate::define($permission,function($val)use($permission){
                $id_login=Auth::guard("admin")->user()->id;
                $rol_user=admin::findOrfail($id_login)->pluck("permission")[0];
                return in_array($permission,$rol_user);
            });
        }
    }
}
