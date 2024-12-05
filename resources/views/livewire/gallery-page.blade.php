{{-- resources/views/livewire/gallery-page.blade.php --}}
<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">Our Gallery</h1>


    <div class="flex justify-center mb-8 space-x-4">
        <button
            wire:click="setFilter('all')"
            class="px-4 py-2 rounded {{ $filter === 'all' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}"
        >
            All Images
        </button>
        <button
            wire:click="setFilter('featured')"
            class="px-4 py-2 rounded {{ $filter === 'featured' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}"
        >
            Featured Images
        </button>
    </div>


    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @forelse($galleries as $image)
            <div class="relative group overflow-hidden rounded-lg shadow-lg">
                <img
                    src="{{ Storage::url($image->file_path) }}"
                    alt="{{ $image->slug }}"
                    class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110"
                >
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>

                @if($image->is_featured)
                    <div class="absolute top-2 right-2">
                        <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded">Featured</span>
                    </div>
                @endif
            </div>
        @empty
            <div class="col-span-4 text-center text-gray-500">
                No images available
            </div>
        @endforelse
    </div>


    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
</div>
