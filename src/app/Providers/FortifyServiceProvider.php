<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::ignoreRoutes();

        $this->configureRoutes();

        Fortify::createUsersUsing(CreateNewUser::class);

//        Fortify::registerView(function () {
//            return redirect()->route('register.step1');
//        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
        });

        // Fortifyの登録POSTリクエストを独自のコントローラにリダイレクト
//        $this->app->instance(RegisteredUserController::class, function() {
        // This will never be called because we're overriding the route
//        return null;
//    });

        $this->app->bind(FortifyLoginRequest::class, LoginRequest::class);
    }

    protected function configureRoutes(): void
    {
        // Fortifyの必要なルートだけを手動で登録
        Route::group([
            'namespace' => 'Laravel\Fortify\Http\Controllers',
            'prefix' => config('fortify.prefix', ''),
            'middleware' => ['web'],
        ], function () {
            // ログイン関連のルートを手動で登録
            $this->loadRoutesFrom(base_path('routes/fortify.php'));
        });
    }
}
