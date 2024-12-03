<div class="p-6 bg-white shadow-md rounded-lg">
    @if($student)
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Profile Information</h2>
        <div class="mb-4">
            <strong>Full Name:</strong> {{ $student->first_name }} {{ $student->last_name }}
        </div>
        <div class="mb-4">
            <strong>Email:</strong> {{ $student->email }}
        </div>
        <div class="mb-4">
            <strong>Phone:</strong> {{ $student->phone }}
        </div>
        <div class="mb-4">
            <strong>Course Registered:</strong> {{ $student->course->name }}
        </div>
        <div class="mb-4">
            <strong>Registration Status:</strong> {{ ucfirst($student->status) }}
        </div>
        <div class="mb-4">
            <strong>Registration Number:</strong> {{ $student->registration_number }}
        </div>
    @else
        <p class="text-gray-600">No profile information available. Please register first.</p>
    @endif
</div>