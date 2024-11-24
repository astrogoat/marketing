<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('marketing.enabled', false);
        $this->migrator->add('marketing.promotion_bar_text', '');
        $this->migrator->add('marketing.promotion_bar_background_color', '#121826');
        $this->migrator->add('marketing.promotion_bar_text_color', '#FFF');
    }

    public function down()
    {
        $this->migrator->delete('marketing.enabled');
        $this->migrator->delete('marketing.promotion_bar_text');
        $this->migrator->delete('marketing.promotion_bar_background_color');
        $this->migrator->delete('marketing.promotion_bar_text_color');
    }
};
