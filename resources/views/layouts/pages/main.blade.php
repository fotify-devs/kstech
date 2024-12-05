@extends('layouts.app')

   @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Hero Section --}}
        <livewire:hero-section />
        
        {{-- Featured Gallery --}}
        <livewire:featured-gallery />

        {{-- About Section --}}
        </div>
    </div>
@endsection
