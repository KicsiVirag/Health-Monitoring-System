<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

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
        //Eating Gates
        Gate::define("eat.index",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatokat!");            
        });
        Gate::define("eat.show",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatot!");            
        });
        Gate::define("eat.store",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User hozhat létre új elemet!");            
        });
        Gate::define("eat.update",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User szerkeszthet!");            
        });

        Gate::define("eat.destroy",function(User $user){
            return ($user->role == "user" )
                    ? Response::allow()
                    : Response::deny("Csak User törölhet!");            
        });

        //Event Gates
        Gate::define("event.index",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatokat!");            
        });
        Gate::define("event.show",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatot!");            
        });
        Gate::define("event.store",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User hozhat létre új elemet!");            
        });
        Gate::define("event.update",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User szerkeszthet!");            
        });

        Gate::define("event.destroy",function(User $user){
            return ($user->role == "user" )
                    ? Response::allow()
                    : Response::deny("Csak User törölhet!");            
        });

        //Health Gates
        Gate::define("health.index",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatokat!");            
        });
        Gate::define("health.show",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatot!");            
        });
        Gate::define("health.update",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User szerkeszthet!");            
        });

        Gate::define("health.destroy",function(User $user){
            return ($user->role == "user" )
                    ? Response::allow()
                    : Response::deny("Csak User törölhet!");            
        });

        //Measure Gates
        Gate::define("measure.index",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatokat!");            
        });
        Gate::define("measure.show",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatot!");            
        });
        Gate::define("measure.store",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User hozhat létre új elemet!");            
        });
        Gate::define("measure.update",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User szerkeszthet!");            
        });

        Gate::define("measure.destroy",function(User $user){
            return ($user->role == "user" )
                    ? Response::allow()
                    : Response::deny("Csak User törölhet!");            
        });

        //Sleep Gates
        Gate::define("sleep.index",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatokat!");            
        });
        Gate::define("sleep.show",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatot!");            
        });
        Gate::define("sleep.store",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User hozhat létre új elemet!");            
        });
        Gate::define("sleep.update",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User szerkeszthet!");            
        });

        Gate::define("sleep.destroy",function(User $user){
            return ($user->role == "user" )
                    ? Response::allow()
                    : Response::deny("Csak User törölhet!");            
        });

        //Training Gates
        Gate::define("training.index",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatokat!");            
        });
        Gate::define("training.show",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatot!");            
        });
        Gate::define("training.store",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User hozhat létre új elemet!");            
        });
        Gate::define("training.update",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User szerkeszthet!");            
        });

        Gate::define("training.destroy",function(User $user){
            return ($user->role == "user" )
                    ? Response::allow()
                    : Response::deny("Csak User törölhet!");            
        });

        //User Gates
        Gate::define("user.index",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatokat!");            
        });
        Gate::define("user.show",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User kérheti le az adatot!");            
        });
        Gate::define("user.update",function(User $user){            

            return ($user->role == "user")
                    ? Response::allow()
                    : Response::deny("Csak User szerkeszthet!");            
        });

        Gate::define("user.destroy",function(User $user){
            return ($user->role == "user" )
                    ? Response::allow()
                    : Response::deny("Csak User törölhet!");            
        });
    }
}
