<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>


<div x-data="themeManager()"
     x-init="initTheme()"
     @theme-toggled.window="handleThemeToggle($event.detail)">

    <!-- Top Info Bar -->
    <div class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white py-2 px-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <div id="real-time-clock" class="text-sm"></div>
            <div class="text-sm">support@fundraiser.org</div>
        </div>
        <div class="flex items-center space-x-4">
            <div class="flex space-x-4 mr-4">
                <a href="#" class="hover:text-violet-200"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-violet-200"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-violet-200"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-violet-200"><i class="fab fa-linkedin"></i></a>
            </div>

            <!-- Theme Toggle -->
            <button
                wire:click="toggleTheme"
                class="text-gray-600 dark:text-white hover:text-violet-600 dark:hover:text-violet-400"
            >
                <svg x-show="!isDarkMode" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 16a4 4 0 0 0 0-8z" />
                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m0 2v4a4 4 0 1 0 0 8v4a8 8 0 1 0 0-16" clip-rule="evenodd" />
                </svg>
                <svg x-show="isDarkMode" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="4" stroke-linejoin="round" />
                        <path stroke-linecap="round" d="M20 12h1M3 12h1m8 8v1m0-18v1m5.657 13.657l.707.707M5.636 5.636l.707.707m0 11.314l-.707.707M18.364 5.636l-.707.707" />
                    </g>
                </svg>
            </button>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" wire:navigate  class="flex items-center">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-6">
                <a href="{{ url('/') }}" class="text-gray-800 dark:text-white hover:text-violet-600 dark:hover:text-violet-400">Home</a>
                <a href="" class="text-gray-800 dark:text-white hover:text-violet-600 dark:hover:text-violet-400">Start Fundraiser</a>
                <a href="" class="text-gray-800 dark:text-white hover:text-violet-600 dark:hover:text-violet-400">Campaigns</a>
                <a href="" class="text-gray-800 dark:text-white hover:text-violet-600 dark:hover:text-violet-400">Resources</a>
                <a href="{{ route('gallery.index') }}" class="text-gray-800 dark:text-white hover:text-violet-600 dark:hover:text-violet-400">Gallery</a>
                <a href="" class="text-gray-800 dark:text-white hover:text-violet-600 dark:hover:text-violet-400">About Us</a>

                <!-- Donate Button -->
                <a href="" class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition">
                    Donate Now
                </a>

                <!-- Authentication Links -->
                @auth
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <button wire:click="logout" class="w-full text-start">
                                    <x-dropdown-link>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                @if (Route::has('register'))
                <div class="relative inline-flex group">
                    <div
                        class="absolute transitiona-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt rounded-lg">
                    </div>
                    <a href="{{ route('register') }}"
                        class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white transition-all duration-200 bg-purple-900 font-pj focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 rounded-lg"
                        role="button">Register
                    </a>
                </div>
            @endif
                @endauth
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="lg:hidden flex items-center space-x-4">
                <button wire:click="toggleMobileMenu" class="text-gray-800 dark:text-white hover:text-violet-600 dark:hover:text-violet-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Overlay) -->
    @if($showMobileMenu)
    <div class="fixed inset-0 bg-white dark:bg-gray-900 z-50">
        <div class="container mx-auto py-8 px-4">
            <div class="flex justify-between items-center mb-8">
                <a href="{{ url('/') }}" wire:navigate  class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
                <div class="flex items-center space-x-4">
                    <!-- Theme Toggle in Mobile Menu -->
                    <button
                        wire:click="toggleTheme"
                        class="text-gray-600 dark:text-white hover:text-violet-600 dark:hover:text-violet-400"
                    >
                        <svg x-show="!isDarkMode" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15">
                            <path fill="currentColor" d="M7.707.003a.5.5 0 0 0-.375.846a6 6 0 0 1-5.569 10.024a.5.5 0 0 0-.519.765A7.5 7.5 0 1 0 7.707.003" />
                        </svg>
                        <svg x-show="isDarkMode" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                <circle cx="12" cy="12" r="5" fill="currentColor" fill-opacity="0.3" />
                                <g fill="none" stroke-dasharray="2" stroke-dashoffset="2">
                                    <path d="M12 19v1M19 12h1M12 5v-1M5 12h-1" />
                                    <animateTransform attributeName="transform" dur="30s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12" />
                                </g>
                            </g>
                        </svg>
                    </button>

                    <button wire:click="toggleMobileMenu" class="text-gray-800 dark:text-white hover:text-violet-600 dark:hover:text-violet-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="space-y-4">
                <a href="{{ url('/') }}" class="block text-gray-800 dark:text-white text-xl py-2 border-b border-gray-200 dark:border-gray-700">Home</a>
                <a href="" class="block text-gray-800 dark:text-white text-xl py-2 border-b border-gray-200 dark:border-gray-700">Start Fundraiser</a>
                <a href="" class="block text-gray-800 dark:text-white text-xl py-2 border-b border-gray-200 dark:border-gray-700">Campaigns</a>
                <a href="" class="block text-gray-800 dark:text-white text-xl py-2 border-b border-gray-200 dark:border-gray-700">Resources</a>
                <a href="" class="block text-gray-800 dark:text-white text-xl py-2 border-b border-gray-200 dark:border-gray-700">Gallery</a>
                <a href="" class="block text-gray-800 dark:text-white text-xl py-2 border-b border-gray-200 dark:border-gray-700">About Us</a>
            </div>
            <div class="mt-8">
                <a href="" class="block bg-green-500 text-white text-center text-xl py-3 rounded-full">
                    Donate Now
                </a>
            </div>

            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        function themeManager() {
            return {
                isDarkMode: false,

                initTheme() {
                    // Retrieve stored theme preference
                    const storedTheme = localStorage.getItem('learning-site-theme');
                    this.isDarkMode = storedTheme === 'dark';
                    this.applyTheme();
                },

                handleThemeToggle(isDark) {
                    this.isDarkMode = isDark;
                    this.applyTheme();
                    localStorage.setItem('learning-site-theme', isDark ? 'dark' : 'light');
                },

                applyTheme() {
                    document.documentElement.classList.toggle('dark', this.isDarkMode);
                }
            }
        }
    </script>
</div>
