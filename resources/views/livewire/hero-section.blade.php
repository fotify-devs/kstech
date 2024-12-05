<!-- Livewire Component: HeroSection.blade.php -->
<div x-data="heroSection()" class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 opacity-90"></div>

    <div class="relative container mx-auto px-4 py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-8 items-center">
            {{-- Left Content Section --}}
            <div class="text-white space-y-6"
                 x-intersect="animateContent()"
                 x-ref="contentSection">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight transform transition-all duration-700 opacity-0"
                    x-bind:class="{'translate-x-0 opacity-100': contentVisible}">
                    Empowering Safety Through Expert Training
                </h1>

                <div class="space-y-4 transform transition-all duration-700 opacity-0"
                     x-bind:class="{'translate-x-0 opacity-100': contentVisible}">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zm0 12l-10-5 10 5 10-5v7l-10 5z"/>
                        </svg>
                        <p class="text-lg">Comprehensive Safety Training Solutions</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zm0 12l-10-5 10 5 10-5v7l-10 5z"/>
                        </svg>
                        <p class="text-lg">OSHA 2007 Compliant Courses</p>
                    </div>
                </div>

                <div class="flex space-x-4 transform transition-all duration-700 opacity-0"
                     x-bind:class="{'translate-x-0 opacity-100': contentVisible}">
                    <a href="#courses"
                       class="bg-white text-blue-800 hover:bg-blue-100 px-6 py-3 rounded-full font-semibold shadow-lg transition duration-300">
                        Explore Courses
                    </a>
                    <a href="#contact"
                       class="border-2 border-white text-white hover:bg-white hover:text-blue-700 px-6 py-3 rounded-full font-semibold shadow-lg transition duration-300">
                        Contact Us
                    </a>
                </div>
            </div>


            {{-- Right Animated Skills Section --}}
            <div class="hidden lg:block relative" x-ref="skillsSection">
                <div class="space-y-6">
                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 transform transition-all duration-700 opacity-0"
                         x-bind:class="{'translate-x-0 opacity-100': skillsVisible}"
                         @mouseenter="highlightSkill($event)">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-500 p-3 rounded-full">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zm0 12l-10-5 10 5 10-5v7l-10 5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white">Process Safety Training</h3>
                                <p class="text-blue-100">Comprehensive industrial safety solutions</p>
                            </div>
                        </div>
                    </div>


                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 transform transition-all duration-700 opacity-0"
                         x-bind:class="{'translate-x-0 opacity-100': skillsVisible}"
                         @mouseenter="highlightSkill($event)">
                        <div class="flex items-center space-x-4">
                            <div class="bg-green-500 p-3 rounded-full">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M10 16v-4h4v4h4v-4h4V8h-4V4h-4v4H6v4h4v4z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white">Emergency First Aid</h3>
                                <p class="text-blue-100">Life-saving medical training</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
function heroSection() {
    return {
        contentVisible: false,
        skillsVisible: false,

        animateContent() {
            setTimeout(() => {
                this.contentVisible = true;
            }, 200);
        },

        highlightSkill(event) {
            const target = event.currentTarget;
            target.classList.add('scale-105', 'shadow-2xl');

            setTimeout(() => {
                target.classList.remove('scale-105', 'shadow-2xl');
            }, 300);
        },

        init() {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.skillsVisible = true;
                        }
                    });
                },
                { threshold: 0.1 }
            );

            observer.observe(this.$refs.skillsSection);
        }
    }
}
</script>
@endpush
