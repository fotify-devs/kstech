<<<<<<< HEAD
<div
    class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
=======
<div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-12 px-4 sm:px-6 lg:px-8">
>>>>>>> origin/master
    <div class="max-w-7xl mx-auto">
        @if ($about)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Content Section --}}
                <div class="space-y-8">
                    {{-- Animated Heading --}}
                    <div class="overflow-hidden">
<<<<<<< HEAD
                        <h1
                            class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white 
                                   transform transition-all duration-500 
                                   translate-y-0 opacity-100 
=======
                        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900
                                   transform transition-all duration-500
                                   translate-y-0 opacity-100
>>>>>>> origin/master
                                   group-hover:translate-y-2 group-hover:opacity-80">
                            {{ $about->heading }}
                        </h1>
                    </div>


                    {{-- Subheading --}}
                    <h2 class="text-2xl font-semibold text-blue-600">
                        {{ $about->sub_heading }}
                    </h2>


                    {{-- About Text --}}
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($about->about_text)) !!}
                    </div>


                    {{-- Feature Highlights --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        @php
                            $features = [
                                'Mission' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                'Vision' =>
                                    'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z',
                            ];
                        @endphp


<<<<<<< HEAD
                        @foreach ($features as $title => $icon)
                            <div class="flex items-center space-x-3 bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $icon }}" />
=======
                        @foreach($features as $title => $icon)
                            <div class="flex items-center space-x-3 bg-white p-3 rounded-lg shadow-md">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
>>>>>>> origin/master
                                </svg>
                                <span class="font-medium text-gray-700">{{ $title }}</span>
                            </div>
                        @endforeach
                    </div>


                    {{-- CTA Button --}}
                    @if ($about->button_text)
                        <div class="pt-4">
<<<<<<< HEAD
                            <a href="#contact"
                                class="inline-flex items-center px-6 py-3 
                                bg-blue-600 text-white rounded-lg 
                                hover:bg-blue-700 transition duration-300 
=======
                            <a href="#contact" class="inline-flex items-center px-6 py-3
                                bg-blue-600 text-white rounded-lg
                                hover:bg-blue-700 transition duration-300
>>>>>>> origin/master
                                shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                {{ $about->button_text }}
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>


                {{-- Media Section --}}
                <div class="relative group">
<<<<<<< HEAD
                    @if ($about->image)
                        <div
                            class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-all duration-500 group-hover:scale-105">
                            <img src="{{ Storage::url($about->image) }}" alt="{{ $about->heading }}"
                                class="w-full h-[500px] object-cover rounded-2xl">

                            {{-- Video Overlay --}}
                            @if ($about->video_id)
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button wire:click="toggleVideo"
                                        class="bg-white text-blue-600 w-20 h-20 rounded-full flex items-center justify-center 
=======
                    @if($about->image)
                        <div class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-all duration-500 group-hover:scale-105">
                            <img
                                src="{{ Storage::url($about->image) }}"
                                alt="{{ $about->heading }}"
                                class="w-full h-[500px] object-cover rounded-2xl"
                            >

                            {{-- Video Overlay --}}
                            @if($about->video_id)
                                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button
                                        wire:click="toggleVideo"
                                        class="bg-white text-blue-600 w-20 h-20 rounded-full flex items-center justify-center
>>>>>>> origin/master
                                               hover:bg-blue-50 hover:scale-110 transition-all duration-300 shadow-lg">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-lg shadow-md">
                <p class="text-2xl text-gray-600">About content not available</p>
            </div>
        @endif
    </div>
    {{-- Video Modal --}}
<<<<<<< HEAD
    @if ($showVideo && $about && $about->video_id)
        <div x-data="{ showModal: @entangle('showVideo') }" x-show="showModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-60 flex items-center justify-center p-4">
            <div @click.away="$wire.set('showVideo', false)"
                class="relative w-full max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden">
                {{-- Close Button --}}
                <button @click="$wire.set('showVideo', false)"
                    class="absolute top-4 right-4 z-50 
                           bg-white dark:bg-gray-700 
                           text-gray-600 dark:text-gray-300 
                           hover:bg-gray-100 dark:hover:bg-gray-600 
                           rounded-full p-2 transition duration-300">
=======
    @if($showVideo && $about && $about->video_id)
        <div
            x-data="{ showModal: @entangle('showVideo') }"
            x-show="showModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-60 flex items-center justify-center p-4"
        >
            <div
                @click.away="$wire.set('showVideo', false)"
                class="relative w-full max-w-4xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden"
            >
                {{-- Close Button --}}
                <button
                    @click="$wire.set('showVideo', false)"
                    class="absolute top-4 right-4 z-50
                           bg-white
                           text-gray-600
                           hover:bg-gray-100
                           rounded-full p-2 transition duration-300"
                >
>>>>>>> origin/master
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>


                {{-- Video Container --}}
                <div class="relative pb-[56.25%] w-full h-0 overflow-hidden">
<<<<<<< HEAD
                    <iframe class="absolute top-0 left-0 w-full h-full"
                        src="https://www.youtube.com/embed/{{ $about->video_id }}?autoplay=1&modestbranding=1&rel=0"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
=======
                    <iframe
                        class="absolute top-0 left-0 w-full h-full"
                        src="https://www.youtube.com/embed/{{ $about->video_id }}?autoplay=1&modestbranding=1&rel=0"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
>>>>>>> origin/master
                </div>


                {{-- Optional Video Description --}}
<<<<<<< HEAD
                @if ($about->video_description)
                    <div class="p-6 bg-gray-50 dark:bg-gray-900">
                        <p class="text-gray-700 dark:text-gray-300 italic">
=======
                @if($about->video_description)
                    <div class="p-6 bg-gray-50">
                        <p class="text-gray-700 italic">
>>>>>>> origin/master
                            {{ $about->video_description }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    @endif


    {{-- Additional Sections --}}
    <section class="max-w-7xl mx-auto mt-16 grid md:grid-cols-3 gap-8">
        {{-- Team Highlights --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Our Team</h3>
            <div class="flex -space-x-2">
                @php
                    $teamMembers = [
                        ['name' => 'John Doe', 'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg'],
                        ['name' => 'Jane Smith', 'avatar' => 'https://randomuser.me/api/portraits/women/2.jpg'],
                        ['name' => 'Mike Johnson', 'avatar' => 'https://randomuser.me/api/portraits/men/3.jpg'],
                    ];
                @endphp
<<<<<<< HEAD
                @foreach ($teamMembers as $member)
                    <img src="{{ $member['avatar'] }}" alt="{{ $member['name'] }}"
                        class="inline-block h-12 w-12 rounded-full ring-2 ring-white dark:ring-gray-800 object-cover">
=======
                @foreach($teamMembers as $member)
                    <img
                        src="{{ $member['avatar'] }}"
                        alt="{{ $member['name'] }}"
                        class="inline-block h-12 w-12 rounded-full ring-2 ring-white object-cover"
                    >
>>>>>>> origin/master
                @endforeach
                <div class="pl-3 text-sm text-gray-500 flex items-center">
                    +{{ count($teamMembers) }} Team Members
                </div>
            </div>
        </div>


        {{-- Achievements --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Achievements</h3>
            <ul class="space-y-2">
                @php
                    $achievements = ['10+ Years in Business', 'Award-Winning Service', 'Global Reach'];
                @endphp
<<<<<<< HEAD
                @foreach ($achievements as $achievement)
                    <li class="flex items-center text-gray-700 dark:text-gray-300">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
=======
                @foreach($achievements as $achievement)
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
>>>>>>> origin/master
                        </svg>
                        {{ $achievement }}
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Fetch settings globally --}}
        @php
            $settings = \App\Models\Setting::first() ?? new \App\Models\Setting();
        @endphp

        {{-- Contact Preview --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Get In Touch</h3>
            <div class="space-y-3">
                <div class="flex items-center text-gray-700">
                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    {{ $settings->contact_email }}
                </div>
<<<<<<< HEAD
                <div class="flex items-center text-gray-700 dark:text-gray-300">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
=======
                <div class="flex items-center text-gray-700">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
>>>>>>> origin/master
                    </svg>
                    {{ $settings->contact_phone }}
                </div>
<<<<<<< HEAD
                <a href="#contact"
                    class="inline-block w-full text-center px-4 py-2 
                    bg-blue-600 text-white rounded-lg 
                    hover:bg-blue-700 transition duration-300 
=======
                <a href="#contact" class="inline-block w-full text-center px-4 py-2
                    bg-blue-600 text-white rounded-lg
                    hover:bg-blue-700 transition duration-300
>>>>>>> origin/master
                    shadow-md hover:shadow-lg">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
</div>
