<?php
namespace GoraPiotr\ModulesVueI18nGenerator;

require_once __DIR__ . '/../vendor/autoload.php';

use GoraPiotr\ModulesVueI18nGenerator\Commands\ModulesVueI18nGeneratorCommand;
use Illuminate\Support\ServiceProvider;

class ModulesVueI18NGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('vue-i18n.generate', function () {
            return new ModulesVueI18nGeneratorCommand();
        });

        $this->commands(
            'vue-i18n.generate'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../vendor/martinlindhe/laravel-vue-i18n-generator/src/config/vue-i18n-generator.php' => config_path('vue-i18n-generator.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../vendor/martinlindhe/laravel-vue-i18n-generator/src/config/vue-i18n-generator.php',
            'vue-i18n-generator'
        );
    }
}
