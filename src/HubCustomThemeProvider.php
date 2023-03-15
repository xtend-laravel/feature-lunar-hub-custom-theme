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
        $this->withRegisterTranslations();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');
    }

    protected function withRegisterTranslations(): void
    {
        $this->app['path.lang'] = __DIR__.'/../resources/lang';
        $this->app->register(TranslationServiceProvider::class);

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
}
