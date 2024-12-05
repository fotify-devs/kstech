<section class="py-12 bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-gray-100 transition-colors duration-300">
            Featured Gallery
        </h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse($featuredImages as $image)
                <div class="relative group overflow-hidden rounded-lg shadow-lg dark:shadow-xl dark:shadow-gray-800/50 transition-all duration-300">
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
</section>