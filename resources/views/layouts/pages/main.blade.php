@extends('layouts.app')


@section('content')
    <div class="py-6 md:py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Carousel --}}
            <div class="mb-8 md:mb-12">
                <livewire:Frontend.home-carousel />
            </div>

            {{-- About Section --}}
            <div class="mb-8 md:mb-12">
            <livewire:about.home-section />
            </div>

            
            {{-- Hero Section --}}
            {{-- <div class="mb-8 md:mb-12">
                <livewire:hero-section />
            </div> --}}

            {{-- Featured Gallery --}}
            <div class="mb-8 md:mb-12">
                <livewire:featured-gallery />
            </div>
                
            {{-- Featured Artists --}}
            {{-- About Section  --}}
            {{-- <div class="mb-8 md:mb-12">
                <livewire:about-section />
            </div> --}}
            {{-- Collaborators Marquee --}}
            <livewire:Frontend.collaborators-marquee  />
        </div>
    </div>
    </div>
@endsection
