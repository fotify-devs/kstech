<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        @foreach($carousels as $index => $carousel)
            <!-- Item {{ $index + 1 }} -->
            <div 
                class="hidden duration-700 ease-in-out" 
                data-carousel-item="{{ $index }}"
            >
                <img 
                    src="{{ $carousel->image_url }}" 
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" 
                    alt="{{ $carousel->heading }}"
                >
                
                <!-- Overlay Content -->
                <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center p-4">
                    @if($carousel->heading)
                        <h2 class="text-2xl md:text-4xl font-bold mb-4">
                            {{ $carousel->heading }}
                        </h2>
                    @endif
                    
                    @if($carousel->subheading)
                        <p class="text-md md:text-xl mb-6">
                            {{ $carousel->subheading }}
                        </p>
                    @endif
                    
                    @if($carousel->button_text && $carousel->button_link)
                        <a 
                            href="{{ $carousel->button_link }}" 
                            class="px-6 py-3 bg-primary-500 hover:bg-primary-600 rounded-lg transition-colors"
                        >
                            {{ $carousel->button_text }}
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>


    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach($carousels as $index => $carousel)
            <button 
                type="button" 
                class="w-3 h-3 rounded-full" 
                aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                aria-label="Slide {{ $index + 1 }}" 
                data-carousel-slide-to="{{ $index }}"
            ></button>
        @endforeach
    </div>


    <!-- Slider controls -->
    <button 
        type="button" 
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" 
        data-carousel-prev
    >
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button 
        type="button" 
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" 
        data-carousel-next
    >
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('default-carousel');
        const items = carousel.querySelectorAll('[data-carousel-item]');
        const indicators = carousel.querySelectorAll('[data-carousel-slide-to]');
        const prevButton = carousel.querySelector('[data-carousel-prev]');
        const nextButton = carousel.querySelector('[data-carousel-next]');
        
        let currentIndex = 0;
        const totalItems = items.length;


        function showSlide(index) {
            items.forEach((item, i) => {
                item.classList.toggle('hidden', i !== index);
            });


            indicators.forEach((indicator, i) => {
                indicator.setAttribute('aria-current', i === index ? 'true' : 'false');
            });
        }


        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalItems;
            showSlide(currentIndex);
        }


        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            showSlide(currentIndex);
        }


        nextButton.addEventListener('click', nextSlide);
        prevButton.addEventListener('click', prevSlide);


        // Auto slide
        setInterval(nextSlide, 5000);


        // Indicator clicks
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentIndex = index;
                showSlide(currentIndex);
            });
        });


        // Initial slide
        showSlide(0);
    });
</script>
@endpush