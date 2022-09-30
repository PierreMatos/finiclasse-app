<?php

namespace App\Providers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if(env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
       
        // if (env('APP_ENV') === 'production') {
        //     $this->app['request']->server->set('HTTPS', true);
        // }
        
        Schema::defaultStringLength(191);

        // Blade money directive
        Blade::directive('money', function ($amount) {
            return "<?php echo number_format($amount, 2).' €'; ?>";
        });
        
        Blade::directive('percentage', function ($amount) {
            return "<?php echo number_format($amount, 2).' %'; ?>";
        });

        View::composer('*', function ($view) {
            if(auth()->user()) {
                $view->with('notifications', auth()->user()->unreadNotifications);
            } else {
                
            }
        });
    }
}
