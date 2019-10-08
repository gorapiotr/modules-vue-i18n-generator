<?php
namespace GoraPiotr\ModulesVueI18nGenerator;

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
        $this->app->singleton('modules-vue-i18n.generate', function () {
            return new ModulesVueI18nGeneratorCommand();
        });

        $this->commands(
            'modules-vue-i18n.generate'
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
            __DIR__ . '/../../../martinlindhe/laravel-vue-i18n-generator/src/config/vue-i18n-generator.php' => config_path('vue-i18n-generator.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../../../martinlindhe/laravel-vue-i18n-generator/src/config/vue-i18n-generator.php',
            'vue-i18n-generator'
        );
    }
}
