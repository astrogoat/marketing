<?php

namespace Astrogoat\Marketing;

use Astrogoat\Marketing\Drivers\LogDriver;
use Illuminate\Support\Manager;

class Marketing extends Manager
{
    public function getDefaultDriver(): string
    {
        return 'log';
    }

    public function createLogDriver()
    {
        return new LogDriver();
    }
}
