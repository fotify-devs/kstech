<div class="container mx-auto p-6">
    @if($student)
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Your Registration Details</h2>
            
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <strong>Registration Number:</strong> 
                    {{ $student->registration_number }}
                </div>
                <div>
                    <strong>Name:</strong> 
                    {{ $student->first_name }} {{ $student->last_name }}
                </div>
                <div>
                    <strong>Email:</strong> 
                    {{ $student->email }}
                </div>
                <div>
                    <strong>Phone:</strong> 
                    {{ $student->phone }}
                </div>
                <div>
                    <strong>Course:</strong> 
                    {{ $student->course->name }}
                </div>
                <div>
                    <strong>Education Level:</strong> 
                    {{ $student->educationLevel->name }}
                </div>
                <div>
                    <strong>Status:</strong> 
                    <span class="
                        @if($student->status == 'pending') text-yellow-600
                        @elseif($student->status == 'approved') text-green-600
                        @else text-red-600
                        @endif
                    ">
                        {{ ucfirst($student->status) }}
                    </span>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">No Registration Found</h2>
            <p>Please register to view your profile.</p>
        </div>
    @endif
</div>