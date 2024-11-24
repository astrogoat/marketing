<?php

namespace Astrogoat\Marketing\Settings\Peripherals;

use Helix\Lego\Settings\Peripherals\Peripheral;
use Illuminate\Validation\Rule;

class PromotionBar extends Peripheral
{
    public function rules(): array
    {
        return [
            'settings.promotion_bar_text' => Rule::requiredIf($this->settings->enabled === true),
            'settings.promotion_bar_background_color' => Rule::requiredIf($this->settings->enabled === true),
            'settings.promotion_bar_text_color' => Rule::requiredIf($this->settings->enabled === true),
        ];
    }

    public function render()
    {
        return view('marketing::settings.peripherals.promotion-bar');
    }
}
