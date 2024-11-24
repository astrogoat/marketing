<?php

namespace Astrogoat\Marketing\Drivers;

use Illuminate\Support\Facades\Log;
use Astrogoat\Marketing\MarketingDriver;

class LogDriver implements MarketingDriver
{
    public function subscribe(string $emailListId, array $attributes): bool
    {
        Log::info('Subscribing with following attributes', $attributes);

        return true;
    }
}
