<?php

namespace Astrogoat\Marketing;

use Astrogoat\Marketing\Settings\MarketingSettings;
use Astrogoat\Marketing\Settings\Peripherals\Popup;
use Astrogoat\Marketing\Settings\Peripherals\PromotionBar;
use Helix\Lego\Apps\App;
use Helix\Lego\Apps\AppPackageServiceProvider;
use Helix\Lego\Apps\Services\IncludeFrontendViews;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;

class MarketingServiceProvider extends AppPackageServiceProvider
{
    public function registerApp(App $app): App
    {
        return $app
            ->name('marketing')
            ->settings(MarketingSettings::class)
            ->migrations([
                __DIR__ . '/../database/migrations',
                __DIR__ . '/../database/migrations/settings',
            ])
            ->publishOnInstall(['public'])
            ->includeFrontendViews(function (IncludeFrontendViews $frontendViews) {
                return $frontendViews->addToHead('marketing::includes.styles');
            })
            ->backendRoutes(__DIR__.'/../routes/backend.php')
            ->frontendRoutes(__DIR__.'/../routes/frontend.php');
    }

    public function configurePackage(Package $package): void
    {
        $package->name('marketing')->hasConfigFile()->hasViews();

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/marketing'),
        ], 'public');
    }

    public function bootingPackage(): void
    {
        Livewire::component('astrogoat.marketing.settings.peripherals.promotion-bar', PromotionBar::class);
        Livewire::component('astrogoat.marketing.settings.peripherals.popup', Popup::class);
    }

    public function registeringPackage(): void
    {
        parent::registeringPackage();

        $this->app->singleton(Marketing::class);
    }
}
