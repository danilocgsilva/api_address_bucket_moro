<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

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
        Blade::directive('page_h1_classes', function ($expression) {
            return "text-4xl font-bold text-gray-800 mb-4";
        });

        Blade::directive('inner_page_container_classes', function ($expression) {
            return "flex items-center justify-center bg-gray-100";
        });

        Blade::directive('input_text_common_classes', function ($expression) {
            return "appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm";
        });

        Blade::directive('main_menu_desktop_classes', function ($expression) {
            return "py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300";
        });

        Blade::directive('main_menu_mobile_classes', function ($expression) {
            return "block text-sm px-2 py-4 hover:bg-green-500 transition duration-300";
        });

        Blade::directive('th_index_classes', function ($expression) {
            return "px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider";
        });
    }
}
