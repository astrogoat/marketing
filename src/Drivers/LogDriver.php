<?php

namespace Astrogoat\Marketing\Drivers;

use Astrogoat\Marketing\MarketingDriver;
use Illuminate\Support\Facades\Log;

class LogDriver implements MarketingDriver
{
    public function subscribe(string $emailListId, array $attributes): bool
    {
        Log::info('Subscribing with following attributes', $attributes);

        return true;
    }
}
