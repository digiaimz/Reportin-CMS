<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-worker', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();

            if(
                in_array(1 , $permissions ) ||
                in_array(2 , $permissions )
                )
            {
                return true;
            }
            return false;

        });


        Gate::define('manage-clips', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(3 , $permissions ) ||
                in_array(4 , $permissions ) ||
                in_array(5 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('manage-tanzim', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(6 , $permissions ) ||
                in_array(7 , $permissions ) ||
                in_array(8 , $permissions ) ||
                in_array(9 , $permissions ) ||
                in_array(10 , $permissions ) ||
                in_array(11 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('manage-language', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(12 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('manage-forum', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(13 , $permissions )  ||
                in_array(14 , $permissions )  ||
                in_array(15 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('manage-forum', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(13 , $permissions )  ||
                in_array(14 , $permissions )  ||
                in_array(15 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('View-Daily-Registration', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(18 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('View-District-Summery', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(22 , $permissions )
                )
            {
                return true;
            }
            return false;

        });


        Gate::define('view-worker', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(1 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('edit-worker', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(2 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('Create-Clips', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(3 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('View-Clips', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(4 , $permissions ) ||
                in_array(5 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('Edit-Clips', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(5 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('View-Forum', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(14 , $permissions ) ||
                in_array(15 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('Edit-Forum', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(15 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('manage-designation', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(9 , $permissions )  ||
                in_array(10 , $permissions )  ||
                in_array(11 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('manage-designation', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(9 , $permissions )  ||
                in_array(10 , $permissions )  ||
                in_array(11 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('create-designation', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(9 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('view-designation', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(10 , $permissions ) ||
                in_array(11 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('edit-designation', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(11 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('view-Tanzim', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(7 , $permissions ) ||
                in_array(8 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('create-Tanzim', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(6 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('edit-Tanzim', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(8 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('view-otp', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(
                in_array(16 , $permissions ) ||
                in_array(17 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('edit-otp', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(17 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('view-stat-report', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(20 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('view-change-password', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(25 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('View-Count-Blocks', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(19 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('View-Forum-Summery', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(21 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('View-District-Summery', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(22 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('View-Zone-Summery', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(23 , $permissions )
                )
            {
                return true;
            }
            return false;

        });



        Gate::define('View-Profession-Summery', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(24 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('View-Gender-Comprasion', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(26 , $permissions )
                )
            {
                return true;
            }
            return false;

        });

        Gate::define('manage-selection', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(13 , $permissions ) ||
                in_array(14 , $permissions ) ||
                in_array(15 , $permissions ) ||
                in_array(27 , $permissions ) ||
                in_array(28 , $permissions ) ||
                in_array(29 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('manage-activities', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(


                in_array(27 , $permissions ) ||
                in_array(28 , $permissions ) ||
                in_array(29 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('create-activity', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(


                in_array(27 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('edit-activity', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(


                in_array(29 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('view-activity', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(


                in_array(28 , $permissions )
                )
            {
                return true;
            }
            return false;

        });
        Gate::define('view-level-x-forum-reprting', function ($user) {
              $permissions = $user->designation->permissions->pluck('id')->toArray();
              if(

                in_array(30 , $permissions )
                )
            {
                return true;
            }
            return false;

        });






    }
}
