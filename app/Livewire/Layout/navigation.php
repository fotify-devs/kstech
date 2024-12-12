<?php
namespace App\Livewire\Layout;


use Livewire\Component;


class Navigation extends Component
{
    public $showMobileMenu = false;
    public $isDarkMode = false;


    public function mount()
    {
        // Initialize theme from localStorage or default to light mode
        $this->initThemePreference();
    }


    public function toggleMobileMenu()
    {
        $this->showMobileMenu = !$this->showMobileMenu;
    }


    public function toggleTheme()
    {
        $this->isDarkMode = !$this->isDarkMode;

        // Dispatch event to update client-side theme
        $this->dispatch('theme-toggled', isDark: $this->isDarkMode);
    }


    public function initThemePreference()
    {
        // This method will be called from the frontend to sync theme
        $this->dispatch('init-theme-preference');
    }


    public function render()
    {
        return view('livewire.layout.navigation');
    }
}
