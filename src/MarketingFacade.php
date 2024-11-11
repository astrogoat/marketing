<?php

namespace Astrogoat\Marketing;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Astrogoat\Marketing\Marketing
 */
class MarketingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'marketing';
    }
}
