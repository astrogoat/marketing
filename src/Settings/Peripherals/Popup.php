<?php

namespace Astrogoat\Marketing\Settings\Peripherals;

use Closure;
use Helix\Lego\Settings\Peripherals\Peripheral;
use Illuminate\Validation\Rule;

class Popup extends Peripheral
{
    public static Closure|null $actions = null;

    public function rules(): array
    {
        return [
            'settings.popup_content' => Rule::requiredIf($this->settings->enabled === true),
        ];
    }

    public function getPopupActions()
    {
        if (static::$actions) {
            return call_user_func(static::$actions);
        }

        return <<<BLADE
<button type="button" @click="open = false" class="astro-mark-inline-flex astro-mark-w-full astro-mark-justify-center astro-mark-rounded-md astro-mark-bg-indigo-600 astro-mark-px-3 astro-mark-py-2 astro-mark-text-sm astro-mark-font-semibold astro-mark-text-white astro-mark-shadow-sm hover:astro-mark-bg-indigo-500 focus:astro-mark-outline-none focus:astro-mark-ring-2 focus:astro-mark-ring-indigo-500 focus:astro-mark-ring-offset-2 dark:astro-mark-bg-indigo-500 dark:hover:astro-mark-bg-indigo-400">
    Okay!!!
</button>
BLADE;
    }

    public function render()
    {
        return view('marketing::settings.peripherals.popup');
    }
}
