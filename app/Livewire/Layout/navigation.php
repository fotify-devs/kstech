<?php
namespace App\Livewire\Layout;


use Livewire\Component;


class Navigation extends Component
{
    public $showMobileMenu = false;
    public $isDarkMode = false;


    public function mount()
    {
        // Retrieve theme preference from localStorage on initial load
        $this->isDarkMode = $this->getStoredThemePreference();
    }


    public function toggleMobileMenu()
    {
        $this->showMobileMenu = !$this->showMobileMenu;
    }


    public function toggleTheme()
    {
        $this->isDarkMode = !$this->isDarkMode;
        
        // Persist theme preference in localStorage
        $this->storeThemePreference($this->isDarkMode);
        
        // Dispatch event for immediate UI update
        $this->dispatch('theme-toggled', $this->isDarkMode);
    }


    private function getStoredThemePreference()
    {
        // This would typically be handled client-side with JavaScript
        return false; // Default to light mode
    }


    private function storeThemePreference($isDark)
    {
        // This would typically be handled client-side with JavaScript
    }


    public function render()
    {
        return view('livewire.layout.navigation', [
            'isDarkMode' => $this->isDarkMode
        ]);
    }
}