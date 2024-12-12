<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make('save')
                ->label('Save Settings')
                ->color('primary')
                ->action(fn () => $this->save()),
        ];
    }

    public function save()
    {
        $data = $this->form->getState();


        // Handle logo upload
        if (isset($data['site_logo']) && is_file($data['site_logo'])) {
            $data['site_logo'] = Setting::updateLogo($data['site_logo']);
        } else {
            unset($data['site_logo']);
        }


        // Handle favicon upload
        if (isset($data['favicon']) && is_file($data['favicon'])) {
            $data['favicon'] = Setting::updateLogo($data['favicon'], 'favicon');
        } else {
            unset($data['favicon']);
        }


        // Ensure only one settings record
        $setting = Setting::first() ?? new Setting();
        $setting->fill($data)->save();


        $this->redirect(request()->header('Referer'));
    }
}
