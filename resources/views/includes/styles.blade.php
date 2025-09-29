@if(app(\Astrogoat\Marketing\Settings\MarketingSettings::class)->enabled)
    <link rel="stylesheet" href="{{ mix('css/marketing.css', 'vendor/marketing') }}">
@endif
