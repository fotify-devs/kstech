<div class="p-6 bg-white shadow-md rounded-lg">
    @if($has_existing_registration)
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Registration Status</h2>
            <p class="text-gray-600">You have already submitted a registration. Please wait for approval.</p>
        </div>
    @else
        <form wire:submit.prevent="submitRegistration" class="space-y-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Student Registration</h2>
            
            {{-- Personal Information --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">First Name</label>
                    <input type="text" wire:model="first_name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('first_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Last Name</label>
                    <input type="text" wire:model="last_name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('last_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>


            {{-- Contact Information --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" wire:model="email" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Phone Number</label>
                    <input type="tel" wire:model="phone" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('phone') <span class="text-red-500
Continuing from where we left off, here’s the complete code for the `student-registration.blade.php` and the `student-profile.blade.php` views:


### `resources/views/livewire/student-registration.blade.php`
```blade
                    <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>


            {{-- Academic Details --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Preferred Course</label>
                    <select wire:model="course_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @error('course_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>


                <div>
                    <label class="block text-gray-700 font-bold mb-2">Education Level</label>
                    <select wire:model="education_level_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Education Level</option>
                        @foreach($education_levels as $education_level)
                            <option value="{{ $education_level->id }}">{{ $education_level->name }}</option>
                        @endforeach
                    </select>
                    @error('education_level_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Mean Grade</label>
                    <select wire:model="mean_grade" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Mean Grade</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                    </select>
                    @error('mean_grade') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>


                <div>
                    <label class="block text-gray-700 font-bold mb-2">Course Level</label>
                    <select wire:model="course_level" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Course Level</option>
                        <option value="Certificate">Certificate</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Degree">Degree</option>
                    </select>
                    @error('course_level') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>


            {{-- Additional Information --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Fee Sponsor</label>
                    <select wire:model="fee_sponsor" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Fee Sponsor</option>
                        <option value="Self">Self</option>
                        <option value="Parents">Parents</option>
                        <option value="Sponsor">Sponsor</option>
                    </select>
                    @error('fee_sponsor') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>


                <div>
                    <label class="block text-gray-700 font-bold mb-2">Next of Kin Name</label>
                    <input type="text" wire:model="next_of_kin_name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('next_of_kin_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Next of Kin Phone</label>
                    <input type="tel" wire:model="next_of_kin_number" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('next_of_kin_number') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>


                <div>
                    <label class="block text-gray-700 font-bold mb-2">Heard About Us</label>
                    <select wire:model="heard_about" class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Select</option>
                        <option value="TV Advertisement">TV Advertisement</option>
                        <option value="Radio">Radio</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Friend/Referral">Friend/Referral</option>
                    </select>
                    @error('heard_about') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="flex justify-center">
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white font-bold rounded-md shadow hover:bg-blue-700">
                    Submit Registration
                </button>
            </div>


            @if(session()->has('success'))
                <div class="mt-4 text-green-500">
                    {{ session('success') }}
                </div>
            @endif
        </form>
    @endif
</div>