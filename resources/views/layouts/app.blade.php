<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $metaTitle ?? config('app.name') }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default description' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @livewireStyles
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        {{-- Header Component --}}
        {{-- <livewire:header /> --}}

        {{-- Navigation Component --}}
        <livewire:layout.navigation />

        {{-- Hero Section --}}
        <livewire:hero-section />


        {{-- Main Content --}}
        <main>
            @yield('content')
            {{-- <livewire:featured-gallery /> --}}
        </main>


        {{-- ====== Footer Section Start --}}
        <x-footer />
        {{-- ====== Footer Section End --}}
        @livewireScripts

        @stack('scripts')
    </div>
</body>

</html>
