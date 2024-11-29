<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Student;

class StudentProfile extends Component
{
    public $student;
    public $existingStudent;

    // Allow passing student data from parent component
    public function mount($student = null)
    {
        if ($student) {
            $this->student = $student;
        } else {
            $this->existingStudent = Student::where('email', Auth::user()->email)->first();
        }
    }

    public function render()
    {
        return view('livewire.student-profile', [
            'student' => $this->student
        ]);
    }

        // Method to handle any profile-specific actions
        public function updatePersonalInfo()
        {
            // Implement logic to update personal information
        }
}