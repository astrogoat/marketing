<?php

namespace Astrogoat\Marketing;

use Astrogoat\Marketing\Settings\MarketingSettings;
use Astrogoat\Marketing\Settings\Peripherals\PromotionBar;
use Helix\Lego\Apps\App;
use Helix\Lego\Apps\AppPackageServiceProvider;
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
            ->backendRoutes(__DIR__.'/../routes/backend.php')
            ->frontendRoutes(__DIR__.'/../routes/frontend.php');
    }

    public function configurePackage(Package $package): void
    {
        $package->name('marketing')->hasConfigFile()->hasViews();
    }

    public function bootingPackage(): void
    {
        Livewire::component('astrogoat.marketing.settings.peripherals.promotion-bar', PromotionBar::class);
    }

    public function registeringPackage(): void
    {
        parent::registeringPackage();

        $this->app->singleton(Marketing::class);
    }
}
