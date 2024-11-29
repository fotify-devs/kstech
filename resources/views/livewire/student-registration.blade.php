<div class="container mx-auto p-6">
    @if($existingStudent)
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Your Registration Details</h2>
            
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <strong>Registration Number:</strong> 
                    {{ $existingStudent->registration_number }}
                </div>
                <div>
                    <strong>Name:</strong> 
                    {{ $existingStudent->first_name }} {{ $existingStudent->last_name }}
                </div>
                <div>
                    <strong>Email:</strong> 
                    {{ $existingStudent->email }}
                </div>
                <div>
                    <strong>Phone:</strong> 
                    {{ $existingStudent->phone }}
                </div>
                <div>
                    <strong>Course:</strong> 
                    {{ $existingStudent->course->name }}
                </div>
                <div>
                    <strong>Education Level:</strong> 
                    {{ $existingStudent->educationLevel->name }}
                </div>
                <div>
                    <strong>Status:</strong> 
                    <span class="
                        @if($existingStudent->status == 'pending') text-yellow-600
                        @elseif($existingStudent->status == 'approved') text-green-600
                        @else text-red-600
                        @endif
                    ">
                        {{ ucfirst($existingStudent->status) }}
                    </span>
                </div>
            </div>
        </div>
    @else
        <form wire:submit.prevent="submitRegistration" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Student Registration</h2>
            
            <!-- Personal Information -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">First Name</label>
                    <input 
                        type="text" 
                        wire:model="first_name" 
                        class="w-full border rounded-md p-2"
                    >
                    @error('first_name') 
                        <span class="text-red-500">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div>
                    <label class="block mb-2">Last Name</label>
                    <input 
                        type="text" 
                        wire:model="last_name" 
                        class="w-full border rounded-md p-2"
                    >
                    @error('last_name') 
                        <span class="text-red-500">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div>
                    <label class="block mb-2">Email</label>
                    <input 
                        type="email" 
                        wire:model="email" 
                        class="w-full border rounded-md p-2"
                    >
                    @error('email') 
                        <span class="text-red-500">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div>
                    <label class="block mb-2">Phone Number</label>
                    <input 
                        type="tel" 
                        wire:model="phone" 
                        class="w-full border rounded-md p-2"
                        placeholder="254712345678"
                    >
                    @error('phone') 
                        <span class="text-red-500">{{ $message }}</span> 
                    @enderror
                </div>
            </div>


            <!-- Academic Details -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-4">Academic Details</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2">Preferred Course</label>
                        <select wire:model="course_id" class="w-full border rounded-md p-2">
                            <option value="">Select a Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        @error('course_id') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>


                    <div>
                        <label class="block mb-2">Highest Education Level</label>
                        <select wire:model="education_level_id" class="w-full border rounded-md p-2">
                            <option value="">Select Education Level</option>
                            @foreach($education_levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                        @error('education_level_id') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>


                    <div>
                        <label class="block mb-2">Mean Grade</label>
                        <select wire:model="mean_grade" class="w-full border rounded-md p-2">
                            <option value="">Select Mean Grade</option>
                            @foreach($mean_grades as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('mean_grade') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>


                    <div>
                        <label class="block mb-2">Course Level</label>
                        <select wire:model="course_level" class="w-full border rounded-md p-2">
                            <option value="">Select Course Level</option>
                            @foreach($course_levels as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('course_level') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Additional Information -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-4">Additional Information</h3>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2">Fee Sponsor</label>
                        <select wire:model="fee_sponsor" class="w-full border rounded-md p-2">
                            <option value="">Select Fee Sponsor</option>
                            @foreach($fee_sponsors as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('fee_sponsor') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>


                    <div>
                        <label class="block mb-2">Nationality</label>
                        <input 
                            type="text" 
                            wire:model="nationality" 
                            class="w-full border rounded-md p-2"
                            readonly
                        >
                        @error('nationality') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>


                    <div>
                        <label class="block mb-2">Next of Kin Name</label>
                        <input 
                            type="text" 
                            wire:model="next_of_kin_name" 
                            class="w-full border rounded-md p-2"
                        >
                        @error('next_of_kin_name') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>


                    <div>
                        <label class="block mb-2">Next of Kin Phone</label>
                        <input 
                            type="tel" 
                            wire:model="next_of_kin_number" 
                            class="w-full border rounded-md p-2"
                            placeholder="254712345678"
                        >
                        @error('next_of_kin_number') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>


                    <div>
                        <label class="block mb-2">How did you hear about us?</label>
                        <select wire:model="heard_about" class="w-full border rounded-md p-2">
                            <option value="">Select an Option</option>
                            <option value="TV Advertisement">TV Advertisement</option>
                            <option value="Radio">Radio</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Friend/Referral">Friend/Referral</option>
                        </select>
                        @error('heard_about') 
                            <span class="text-red-500">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
            </div>


            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">
                    Submit Registration
                </button>
                @if (session()->has('success'))
                    <div class="mt-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="mt-4 text-red-600">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </form>
    @endif
</div>