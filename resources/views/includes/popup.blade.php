@php
    use Astrogoat\Marketing\Settings\MarketingSettings;
    use Astrogoat\Marketing\Settings\Peripherals\Popup;
@endphp

<style>
    ul {
        list-style-type: disc;
        margin-left: 1.5rem; /* Adjust as needed */
    }

    ol {
        list-style-type: numeric;
        margin-left: 1.5rem; /* Adjust as needed */
    }
</style>

<div x-data="{
        open: false,
        hasShown: false,
        init() {
            // Check if modal has already been shown this session
            this.hasShown = sessionStorage.getItem('astrogoat-marketing-popup-shown') === 'true';

            // Only show if it hasn't been shown this session
            if (({{ app(MarketingSettings::class)->popup_show_once_per_session ? 'true' : 'false' }} && this.hasShown)) {
                return
            }

            setTimeout(() => {
                this.open = true;
                this.markAsShown();
            }, {{ app(MarketingSettings::class)->popup_delay_in_seconds * 1000 }});
        },

        markAsShown() {
            this.hasShown = true;
            sessionStorage.setItem('astrogoat-marketing-popup-shown', 'true');
        },

        openModal() {
            this.open = true;

            if (! this.hasShown) {
                this.markAsShown();
            }
        },

        closeModal() {
            this.open = false;
        }
    }">
{{--    <button @click="openModal()"--}}
{{--            class="astro-mark-rounded-md astro-mark-bg-gray-950/5 astro-mark-px-2.5 astro-mark-py-1.5 astro-mark-text-sm astro-mark-font-semibold astro-mark-text-gray-900 hover:astro-mark-bg-gray-950/10 dark:astro-mark-bg-white/10 dark:astro-mark-text-white dark:astro-mark-ring-1 dark:astro-mark-ring-inset dark:astro-mark-ring-white/5 dark:hover:astro-mark-bg-white/20">--}}
{{--        Open dialog--}}
{{--    </button>--}}

    <!-- Modal -->
    <div x-show="open" x-cloak class="astro-mark-fixed astro-mark-inset-0 astro-mark-z-50 astro-mark-overflow-y-auto"
         aria-labelledby="dialog-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div
            x-show="open"
            x-transition:enter="astro-mark-transition-opacity astro-mark-duration-300 astro-mark-ease-out"
            x-transition:enter-start="astro-mark-opacity-0"
            x-transition:enter-end="astro-mark-opacity-100"
            x-transition:leave="astro-mark-transition-opacity astro-mark-duration-200 astro-mark-ease-in"
            x-transition:leave-start="astro-mark-opacity-100"
            x-transition:leave-end="astro-mark-opacity-0"
            class="astro-mark-fixed astro-mark-inset-0 astro-mark-bg-gray-500/75 dark:astro-mark-bg-gray-900/50"
            @click="open = false"
        >
        </div>

        <!-- Modal panel -->
        <div
            class="astro-mark-flex astro-mark-min-h-full astro-mark-items-center astro-mark-justify-center astro-mark-p-4 sm:astro-mark-items-center sm:astro-mark-p-0">
            <div
                x-show="open"
                x-transition:enter="astro-mark-transition-all astro-mark-duration-300 astro-mark-ease-out"
                x-transition:enter-start="astro-mark-opacity-0 astro-mark-translate-y-4 sm:astro-mark-translate-y-0 sm:astro-mark-scale-95"
                x-transition:enter-end="astro-mark-opacity-100 astro-mark-translate-y-0 sm:astro-mark-scale-100"
                x-transition:leave="astro-mark-transition-all astro-mark-duration-200 astro-mark-ease-in"
                x-transition:leave-start="astro-mark-opacity-100 astro-mark-translate-y-0 sm:astro-mark-scale-100"
                x-transition:leave-end="astro-mark-opacity-0 astro-mark-translate-y-4 sm:astro-mark-translate-y-0 sm:astro-mark-scale-95"
                class="astro-mark-relative astro-mark-transform astro-mark-overflow-hidden astro-mark-rounded-lg astro-mark-bg-white astro-mark-px-4 astro-mark-pt-5 astro-mark-pb-4 astro-mark-text-left astro-mark-shadow-xl sm:astro-mark-my-8 sm:astro-mark-w-full sm:astro-mark-max-w-2xl sm:astro-mark-p-6 dark:astro-mark-bg-gray-800 dark:astro-mark-ring-1 dark:astro-mark--ring-offset-1 dark:astro-mark-ring-white/10"
                @click.stop
            >

                <div>
                    @if(app(MarketingSettings::class)->popup_icon)
                        <div
                            class="astro-mark-mx-auto astro-mark-flex astro-mark-w-12 astro-mark-h-12 astro-mark-items-center astro-mark-justify-center astro-mark-rounded-full astro-mark-bg-green-100 dark:astro-mark-bg-green-500/10">
                            @svg(json_decode(app(MarketingSettings::class)->popup_icon, true)['svg'] ?? '', 'astro-mark-w-6 astro-mark-h-6 astro-mark-text-green-600 dark:astro-mark-text-green-400')
                        </div>
                    @endif

                    <div class="astro-mark-mt-3 {{ app(MarketingSettings::class)->popup_center_content ? 'astro-mark-text-center' : '' }} sm:astro-mark-mt-5">
                        @if(app(MarketingSettings::class)->popup_title)
                            <h3
                                id="dialog-title"
                                class="astro-mark-text-2xl astro-mark-text-center astro-mark-font-semibold astro-mark-mb-4 astro-mark-text-gray-900 dark:astro-mark-text-white"
                            >
                                {{ app(MarketingSettings::class)->popup_title }}
                            </h3>
                        @endif

                        @if(app(MarketingSettings::class)->popup_content)
                            <div class="astro-mark-mt-2">
                                <p class="astro-mark-text-sm astro-mark-text-gray-500 dark:astro-mark-text-gray-400 astro-mark-list-inside">
                                    {!! app(MarketingSettings::class)->popup_content !!}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="astro-mark-mt-5 sm:astro-mark-mt-6">
                    {!! app(Popup::class)->getPopupActions() !!}
                </div>
            </div>
        </div>
    </div>
</div>
