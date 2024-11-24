<?php

namespace Astrogoat\Marketing;

use Illuminate\Support\Manager;
use Astrogoat\Marketing\Drivers\LogDriver;

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
