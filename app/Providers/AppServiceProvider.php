<?php

namespace App\Providers;

use App\Models\Utilities;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Blade::directive('convert', function ($value) {
            return "<?php echo number_format($value, 2); ?>";
        });

        view()->composer('*', function($view){
            $view->with('utilities', Utilities::orderBy('id', 'desc')->get());

        });
    }
}
