<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('marketing.popup_title', '');
        $this->migrator->add('marketing.popup_icon', '');
        $this->migrator->add('marketing.popup_content', '');
        $this->migrator->add('marketing.popup_center_content', true);
        $this->migrator->add('marketing.popup_delay_in_seconds', 5);
        $this->migrator->add('marketing.popup_background_color', '#121826');
        $this->migrator->add('marketing.popup_text_color', '#FFF');
        $this->migrator->add('marketing.popup_show_once_per_session', true);
    }

    public function down()
    {
        $this->migrator->delete('marketing.popup_title');
        $this->migrator->delete('marketing.popup_icon');
        $this->migrator->delete('marketing.popup_content');
        $this->migrator->delete('marketing.popup_center_content');
        $this->migrator->delete('marketing.popup_delay_in_seconds');
        $this->migrator->delete('marketing.popup_background_color');
        $this->migrator->delete('marketing.popup_text_color');
        $this->migrator->delete('marketing.popup_show_once_per_session');
    }
};
