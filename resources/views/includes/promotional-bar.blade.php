@php
    use Astrogoat\Marketing\Settings\MarketingSettings;
    use Astrogoat\Marketing\Settings\Peripherals\PromotionBar;

    $settings = app(MarketingSettings::class);
    $extensionIsSelected = app('lego')->selectedSettingExtensionIs('marketing', PromotionBar::class, 'marketing');
@endphp

@if($settings->enabled && $extensionIsSelected)
    <div
        style="
            background-color: {{ $settings->promotion_bar_background_color }};
            color: {{ $settings->promotion_bar_text_color }};
            padding: 5px 10px;
            text-align: center;
        "
    >
        {!! $settings->promotion_bar_text !!}
    </div>
@endif
