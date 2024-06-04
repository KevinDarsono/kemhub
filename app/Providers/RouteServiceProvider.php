<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Constants\Roles as CodeRoles;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // RateLimiter::for('api', function (Request $request) {
        //     return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        // });

        $this->routes(function () {
            Route::middleware('web')
                ->prefix('rest-api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // ==========================================
            // ADMINISTRATOR

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::ADMINISTRATOR.''
            ])->prefix('app/administrator')
            ->name('app.administrator.')
            ->group(base_path('routes/administrator/web.php'));

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::ADMINISTRATOR.''
            ])->prefix('api-administrator')
            ->name('api.administrator.')
            ->group(base_path('routes/administrator/api.php'));

            // END ADMINISTRATOR


            // KEMENTERIAN PERHUBUNGAN

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::KEMENTERIAN_PERHUBUNGAN.''
            ])->prefix('app/nasional')
            ->name('app.nasional.')
            ->group(base_path('routes/kementerian_perhubungan/web.php'));

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::KEMENTERIAN_PERHUBUNGAN.''
            ])->prefix('api-nasional')
            ->name('api.nasional.')
            ->group(base_path('routes/kementerian_perhubungan/api.php'));

            // END KEMENTERIAN PERHUBUNGAN

            // BPTD

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::BPTD.''
            ])->prefix('app/bptd')
            ->name('app.bptd.')
            ->group(base_path('routes/bptd/web.php'));

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::BPTD.''
            ])->prefix('api-bptd')
            ->name('api.bptd.')
            ->group(base_path('routes/bptd/api.php'));

            // END BPTD

            // DISHUB PROVINSI

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::DINAS_PERHUBUNGAN_PROVINSI.''
            ])->prefix('app/dishub-prov')
            ->name('app.dishub-prov.')
            ->group(base_path('routes/dinas_perhubungan_provinsi/web.php'));

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::DINAS_PERHUBUNGAN_PROVINSI.''
            ])->prefix('api-dishub-prov')
            ->name('api.dishub-prov.')
            ->group(base_path('routes/dinas_perhubungan_provinsi/api.php'));

            // END DISHUB PROVINSI

            // DISHUB KOTA

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::DINAS_PERHUBUNGAN_KOTA.''
            ])->prefix('app/dishub-kota')
            ->name('app.dishub-kota.')
            ->group(base_path('routes/dinas_perhubungan_kota/web.php'));

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::DINAS_PERHUBUNGAN_KOTA.''
            ])->prefix('api-dishub-kota')
            ->name('api.dishub-kota.')
            ->group(base_path('routes/dinas_perhubungan_kota/api.php'));

            // END DISHUB KOTA

            // DISHUB KABUPATEN

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::DINAS_PERHUBUNGAN_KABUPATEN.''
            ])->prefix('app/dishub-kab')
            ->name('app.dishub-kab.')
            ->group(base_path('routes/dinas_perhubungan_kabupaten/web.php'));

            Route::middleware([
                'web',
                'auth',
                'check_role:'.CodeRoles::DINAS_PERHUBUNGAN_KABUPATEN.''
            ])->prefix('api-dishub-kab')
            ->name('api.dishub-kab.')
            ->group(base_path('routes/dinas_perhubungan_kabupaten/api.php'));

            // END DISHUB KABUPATEN
        });
    }
}
