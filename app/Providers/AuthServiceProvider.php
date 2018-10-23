<?php

namespace App\Providers;

use App\User;
Use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
   
    public function register()
    {
        
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.
        Gate::policy(User::class,UserPolicy::class);
        Gate::policy(Opportunity::class,OpportunityPolicy::class);
        Gate::policy(Account::class,AccountsPolicy::class);
        Gate::policy(Contact::class,ContactPolicy::class);
        Gate::policy(Message::class,MessagePolicy::class);
        Gate::policy(Meeting::class,MeetingPolicy::class);


        $this->app['auth']->viaRequest('api', function ($request) {
            return \App\User::where('email', $request->input('email'))->first();
            // if ($request->input('api_token')) {
            //     return User::where('api_token', $request->input('api_token'))->first();
            // }
        });
    }
}
