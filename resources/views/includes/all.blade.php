@php
    use Astrogoat\Marketing\Settings\MarketingSettings;
    use Astrogoat\Marketing\Settings\Peripherals\Popup;use Astrogoat\Marketing\Settings\Peripherals\PromotionBar;

    $settings = app(MarketingSettings::class);
@endphp

@includeWhen($settings->enabled, 'marketing::includes.promotional-bar')
{{--@includeWhen($settings->enabled && app('lego')->selectedSettingExtensionIs('marketing', PromotionBar::class, 'marketing'), 'marketing::includes.promotional-bar')--}}
@includeWhen($settings->enabled && app('lego')->selectedSettingExtensionIs('marketing', Popup::class, 'marketing'), 'marketing::includes.popup')
