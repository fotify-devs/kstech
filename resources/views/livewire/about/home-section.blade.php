<section class="py-16 dark:bg-dark">
    <div class="container mx-auto px-4">
        @if($about)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Text Content -->
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                        {{ $about->heading }}
                    </h2>
                    
                    <h3 class="text-xl md:text-2xl text-gray-700 dark:text-gray-300">
                        {{ $about->sub_heading }}
                    </h3>
                    
                    <div class="prose max-w-none text-gray-600 dark:text-gray-400">
                        <p>{{ $limitedAboutText }}</p>
                    </div>
                    
                    @if($about->button_text)
                        <div class="pt-4">
                            <a href="{{ route('about') }}" 
                               class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                                {{ $about->button_text }}
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>


                <!-- Image and Video Section -->
                <div class="relative group">
                    @if($about->image)
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="{{ Storage::url($about->image) }}" 
                                 alt="{{ $about->heading }}" 
                                 class="w-full h-[400px] object-cover">
                            
                            @if($about->video_id)
                                <!-- Play Button -->
                                <button 
                                    wire:click="toggleVideo"
                                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
                                           w-16 h-16 bg-white rounded-full flex items-center justify-center
                                           shadow-lg hover:scale-110 transition duration-300 group">
                                    <svg class="w-8 h-8 text-blue-600 group-hover:text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11v15.78a1.5 1.5 0 002.3 1.269l12.5-7.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="text-center py-12 bg-gray-100 dark:bg-gray-800">
                <p class="text-xl text-gray-600 dark:text-gray-400">About content not available</p>
            </div>
        @endif
    </div>


    <!-- Responsive Video Modal -->
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
            class="fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50 flex items-center justify-center p-4"
        >
            <div 
                @click.away="$wire.set('showVideo', false)"
                class="relative w-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl"
            >
                <!-- Close Button -->
                <button 
                    @click="$wire.set('showVideo', false)"
                    class="absolute top-2 right-2 z-50 text-gray-500 hover:text-gray-800 bg-white rounded-full p-2"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Responsive Video Container -->
                <div class="relative pb-[56.25%] w-full h-0 overflow-hidden rounded-lg">
                    <iframe 
                        class="absolute top-0 left-0 w-full h-full"
                        src="https://www.youtube.com/embed/{{ $about->video_id }}?autoplay=1&modestbranding=1&rel=0" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    @endif
</section>