<?php

namespace Astrogoat\Marketing\Settings;

use Astrogoat\Marketing\Settings\Peripherals\PromotionBar;
use Helix\Lego\Settings\AppSettings;

class MarketingSettings extends AppSettings
{
    public string $promotion_bar_text;
    public string $promotion_bar_background_color;
    public string $promotion_bar_text_color;

    protected array $peripherals = [
        PromotionBar::class,
    ];

    public function rules(): array
    {
        return [
//            'settings.promotion_bar_text' => Rule::requiredIf($this->enabled === true),
        ];
    }

    public function description(): string
    {
        return 'Miscellaneous marketing tools.';
    }

    public static function group(): string
    {
        return 'marketing';
    }

    public function hidden(): array
    {
        return $this->getPublicPropertiesStartingWith('promotion_bar_');
    }
}
