<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Setting;

class Footer extends Component
{
    public $settings;


    public function mount()
    {
        $this->settings = Setting::first() ?? new Setting();
    }


    public function render()
    {
        return view('livewire.frontend.footer', [
            'settings' => $this->settings
        ]);
    }


    // Optional: Method to get social icon class
    public function getSocialIcon(string $platform): string
    {
        $icons = [
            'facebook' => 'fab fa-facebook-f',
            'twitter' => 'fab fa-twitter',
            'instagram' => 'fab fa-instagram',
            'linkedin' => 'fab fa-linkedin-in',
            'youtube' => 'fab fa-youtube',
            'pinterest' => 'fab fa-pinterest-p',
            'github' => 'fab fa-github',
        ];


        return $icons[$platform] ?? 'fab fa-link';
    }
}