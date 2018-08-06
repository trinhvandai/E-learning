<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

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

        Gate::define('is-teacher', function () {
            return (Auth::user()->role === 1);
        });

        Gate::define('is-student', function () {
            return (Auth::user()->role === 2);
        });

        Gate::define('active-available', function ($user, $code) {
            if (Auth::user()->role !== 1) {
                return false;
            }
            $position = strpos($code, '-');
            $courseId = substr($code, 0, $position);
            $userId = substr($code, $position + 1, strlen($code));

            return \App\Models\CoursesUser::where('course_id', $courseId)->where('user_id', $userId)->first()->active === 1;
        });
    }
}
