<footer class="bg-gradient-to-br from-blue-900 to-indigo-900 text-white">
    <div class="container mx-auto px-4 py-16 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <div class="flex items-center mb-6">
                    <img src="{{ Storage::url($settings->site_logo) }}" alt="Kenya Safety Tech Logo" class="h-12 mr-4">
                    <h2 class="text-3xl font-bold text-white">{{ $settings->site_name ?? config('app.name') }}</h2>
                </div>
                <p class="text-blue-100 mb-6">
                    {{ $settings->site_description }}
                </p>
                <div class="flex space-x-4">
                    <a href="tel:+254XXXXXXXXX" class="text-white hover:text-blue-200 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        {{ $settings->contact_phone }}
                    </a>
                    <a href="mailto:info@kenyasafetytech.com" class="text-white hover:text-blue-200 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $settings->contact_email }}
                    </a>
                </div>
            </div>


            <div>
                <h4 class="text-xl font-semibold mb-6 text-blue-200">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="" class="text-white hover:text-blue-200">Training Courses</a></li>
                    <li><a href="" class="text-white hover:text-blue-200">About Us</a></li>
                    <li><a href="" class="text-white hover:text-blue-200">Our Services</a></li>
                    <li><a href="" class="text-white hover:text-blue-200">Contact</a></li>
                </ul>
            </div>


            <div>
                <h4 class="text-xl font-semibold mb-6 text-blue-200">Legal</h4>
                <ul class="space-y-3">
                    <li><a href="" class="text-white hover:text-blue-200">Privacy Policy</a></li>
                    <li><a href="" class="text-white hover:text-blue-200">Terms & Conditions</a></li>
                    <li><a href="" class="text-white hover:text-blue-200">Certifications</a></li>
                    <li><a href="" class="text-white hover:text-blue-200">Accreditations</a></li>
                </ul>
            </div>
        </div>


        <div class="mt-12 pt-6 border-t border-blue-800 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-blue-200 mb-4 md:mb-0">
                &copy; {{ date('Y') }} {{ $settings->site_name ?? config('app.name') }}. 
                All Rights Reserved.
            </p>
            <div class="flex space-x-4">
                @if ($settings->social_links)
                    <div class="flex space-x-4">
                        @foreach ($settings->social_links as $social)
                            @if (isset($social['platform']) && isset($social['url']))
                                <a href="{{ $social['url'] }}" target="_blank"
                                    class="text-white hover:text-primary transition duration-300">
                                    <i class="{{ $this->getSocialIcon($social['platform']) }}"></i>
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</footer>
