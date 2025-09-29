<x-fab::layouts.panel
    title="Popup"
    allow-overflow
>
    <div
        class="grid grid-cols-2 gap-4"
        @icon-selected.window="if ($event.detail.brickKey === 'settings.popup_icon') { $wire.set('settings.popup_icon', $event.detail.icon); }"
    >
        <x-fab::forms.input
            label="Title"
            wire:model="settings.popup_title"
        />

        <div class="flex flex-col">
            <label class="fab-block fab-text-sm fab-font-medium fab-text-gray-700 dark:fab-text-slate-200 mb-1">Icon</label>
            <div class="flex items-center">
                @if(data_get($this, 'settings.popup_icon') ?? false)
                    <x-fab::elements.button
                        x-on:click="$wire.set('settings.popup_icon', '')"
                    >
                        Remove Icon
                    </x-fab::elements.button>
                @else
                    <x-fab::elements.button
                        x-on:click="$modal.open(
                            'astrogoat.strata.overlays.icon-library',
                            {{ json_encode([
                                'selectedIcon' => data_get($this, 'settings.popup_icon'),
                                'brickKey' => 'settings.popup_icon',
                            ]) }}
                        )"
                    >
                        Select Icon
                    </x-fab::elements.button>
                @endif

                @if(data_get($this, 'settings.popup_icon') ?? false)
                    @svg(json_decode(data_get($this, 'settings.popup_icon'), true)['svg'] ?? '', 'size-6 ml-4')
                @endif
            </div>
        </div>


        <x-fab::forms.editor
            label="Content"
            wire:model="settings.popup_content"
            class="col-span-2"
        />

{{--        <x-lego::color-picker--}}
{{--            label="Background Color"--}}
{{--            position="right"--}}
{{--            :color="data_get($this, 'settings.popup_background_color')"--}}
{{--            x-on:color-picker-change="$wire.set('settings.popup_background_color', $event.detail)"--}}
{{--        />--}}

{{--        <x-lego::color-picker--}}
{{--            label="Text Color"--}}
{{--            wire:model="settings.popup_text_color"--}}
{{--            :color="data_get($this, 'settings.popup_text_color')"--}}
{{--            x-on:color-picker-change="$wire.set('settings.popup_text_color', $event.detail)"--}}
{{--            position="left"--}}
{{--        />--}}

        <x-fab::forms.input
            label="Delay (in seconds)"
            type="number"
            min="0"
            wire:model="settings.popup_delay_in_seconds"
        ></x-fab::forms.input>

        <x-fab::forms.checkbox
            label="Center content"
            wire:model="settings.popup_center_content"
        />

        <x-fab::forms.checkbox
            label="Show once per session"
            wire:model="settings.popup_show_once_per_session"
        />
    </div>
</x-fab::layouts.panel>
