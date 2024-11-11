<?php

namespace Astrogoat\Marketing\Settings;

use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;

class MarketingSettings extends AppSettings
{
    // public string $url;

    public function rules(): array
    {
        // return [
        //     'url' => Rule::requiredIf($this->enabled === true),
        // ];
    }

    public function description(): string
    {
        return 'Interact with Marketing.';
    }

    public static function group(): string
    {
        return 'marketing';
    }
}
