<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;


use App\Traits\Comments;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    use Comments;
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        $this->registerPolicies();

        Gate::define('admin', function () {
            if (auth()->user()->hasRole('admin')) {
                return Response::allow();
            }
        });

        Gate::define('moderator', function () {
            if (auth()->user()->hasRole(['admin', 'moderator'])) {
                return Response::allow();
            }
        });

        Gate::define('destroy-comments', function (User $user, Comment $comment) {
            if (self::destroyComments($user,$comment)){
                return Response::allow();
            }


        });

        Gate::define('update-comments', function (User $user, Comment $comment) {
            if (self::updateComments($user,$comment)){
                return Response::allow();
            }
        });

    }
}
