<?php

namespace XtendLunar\Features\HubCustomTheme;

use CodeLabX\XtendLaravel\Base\XtendFeatureProvider;
use CodeLabX\XtendLaravel\Services\Translation\FileLoader;
use CodeLabX\XtendLaravel\Services\Translation\TranslationServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class HubCustomThemeProvider extends XtendFeatureProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');
        $this->withRegisterTranslations();
    }

    protected function withRegisterTranslations(): void
    {
        $this->app->register(TranslationServiceProvider::class);
        $this->app->singleton('translation.loader', function ($app) {
            $app['path.lang'] = __DIR__.'/../resources/lang';
            return new FileLoader($app['files'], $app['path.lang']);
        });

        // @todo This overrides all translations so need a condition to make sure this is only loaded for the hub
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'adminhub');
    }

    public function boot()
    {
        View::composer('adminhub::*', function (\Illuminate\View\View $view) {
            $view->with([
                'viteSupport' => Blade::defaultAliases()->keys()->contains('Vite'),
                'vite' => ['resources/css/hub-extend.css', 'resources/js/hub-extend.js'],
            ]);
        });
    }

    public function provides()
    {
        return ['translation.loader'];
    }
}
