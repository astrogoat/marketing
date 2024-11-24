<?php

namespace Astrogoat\Marketing;

interface MarketingDriver
{
    public function subscribe(string $emailListId, array $attributes): bool;
}
