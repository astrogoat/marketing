<div>
    <div>
        <x-fab::forms.input
            label="Text"
            wire:model="settings.promotion_bar_text"
        />
    </div>

    <div class="grid grid-cols-2 gap-4 mt-4">
        <x-lego::color-picker
            label="Button Background Color"
            wire:model="settings.promotion_bar_background_color"
            position="right"
        />

        <x-lego::color-picker
            label="Button Background Color"
            wire:model="settings.promotion_bar_text_color"
            position="left"
        />
    </div>
</div>
