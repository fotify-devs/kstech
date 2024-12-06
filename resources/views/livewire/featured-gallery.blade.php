<section class="py-12 bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-gray-100 transition-colors duration-300">
            Featured Gallery
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse($featuredImages as $image)
                <div
                    wire:click="openImageModal({{ $image->id }})"
                    class="relative group overflow-hidden rounded-lg shadow-lg dark:shadow-xl dark:shadow-gray-800/50 transition-all duration-300 cursor-pointer"
                >
                    <img
                        src="{{ Storage::url($image->file_path) }}"
                        alt="{{ $image->slug }}"
                        class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110"
                    >
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 dark:group-hover:bg-opacity-40 transition-all duration-300"></div>
                    <div class="absolute top-2 right-2">
                        <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded">
                            Featured
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500 dark:text-gray-400 transition-colors duration-300">
                    No featured images available
                </div>
            @endforelse
        </div>
    </div>


    {{-- Image Modal --}}
    @if($selectedImage)
        <div
            x-data
            x-trap.noscroll="true"
            x-show="true"
            x-init="
                $nextTick(() => {
                    $refs.imageModal.focus();
                });
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        $wire.call('closeImageModal');
                    }
                });
            "
            x-ref="imageModal"
            tabindex="0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm animate-fade-in"
            wire:click.self="closeImageModal"
        >
            <div
                @click.stop
                class="relative w-11/12 max-w-4xl max-h-[90vh] bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden animate-scale-in"
            >
                {{-- Image Container --}}
                <div class="relative w-full h-[70vh] flex items-center justify-center">
                    <img
                        src="{{ Storage::url($selectedImage->file_path) }}"
                        alt="{{ $selectedImage->slug }}"
                        class="max-w-full max-h-full object-contain"
                    >
                </div>


                {{-- Modal Controls --}}
                <div class="absolute top-0 left-0 right-0 flex justify-between p-4">
                    {{-- Image Info --}}
                    <div class="text-gray-600 dark:text-gray-300">
                        <h3 class="text-lg font-semibold">{{ $selectedImage->slug }}</h3>
                        <p class="text-sm">{{ $selectedImage->created_at->format('F d, Y') }}</p>
                    </div>


                    {{-- Action Buttons --}}
                    <div class="flex space-x-4">
                        {{-- Download Button --}}
                        <a
                            href="{{ Storage::url($selectedImage->file_path) }}"
                            download
                            class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                            title="Download Image"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>


                        {{-- Close Button --}}
                        <button
                            wire:click="closeImageModal"
                            class="text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 transition-colors"
                            title="Close"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
