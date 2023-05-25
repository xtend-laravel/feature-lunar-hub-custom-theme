<?php

namespace XtendLunar\Features\HubCustomTheme;

use CodeLabX\XtendLaravel\Base\XtendFeatureProvider;
use CodeLabX\XtendLaravel\Services\Translation\TranslationServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use XtendLunar\Features\HubCustomTheme\Lunar\Livewire\Components\Customers\CustomerShow;
use XtendLunar\Features\HubCustomTheme\Lunar\Livewire\Dashboard;

class HubCustomThemeProvider extends XtendFeatureProvider
{
    public function register()
    {
        $this->withRegisterTranslations();
        $this->loadViewsFrom(__DIR__.'/../resources/views/lunar', 'adminhub');
        $this->loadViewsFrom(__DIR__.'/../resources/views/addons', 'hub.addons');
        $this->loadViewsFrom(__DIR__.'/../resources/views/features', 'hub.features');
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
        //Blade::componentNamespace('XtendLunar\\Features\\HubCustomTheme\\Lunar\\Components', 'hub-custom-theme');
        Blade::componentNamespace('XtendLunar\\Features\\HubCustomTheme\\Features\\SidebarMenu\\Components', 'hub.feature.sidebar-menu');

        $this->registerThemeComponents();
    }

    protected function registerThemeComponents(): void
    {
        // @todo Customise dashboard feature to be added later
        Livewire::component('dashboard', Dashboard::class);

        Livewire::component('hub.components.customers.show', CustomerShow::class);
    }
}
