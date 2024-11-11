<?php

namespace Astrogoat\Marketing;

use Helix\Lego\Apps\App;
use Helix\Lego\Apps\AppPackageServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Astrogoat\Marketing\Settings\MarketingSettings;

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
}
