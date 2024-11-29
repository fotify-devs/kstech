<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Course;
use App\Models\EducationLevel;
use App\Models\Student;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth; 

class StudentRegistration extends Component
{
    // Personal Information
    #[Rule('required|string|max:50')]
    public $first_name = '';


    #[Rule('required|string|max:50')]
    public $last_name = '';


    #[Rule('required|email|unique:students,email')]
    public $email = '';


    #[Rule('required')]
    public $phone = '';


    // Academic Details
    #[Rule('required|exists:courses,id')]
    public $course_id;


    #[Rule('required|exists:education_levels,id')]
    public $education_level_id;


    #[Rule('required|in:A,A-,B+,B,B-')]
    public $mean_grade;


    #[Rule('required|in:Certificate,Diploma,Degree')]
    public $course_level;


    // Additional Information
    #[Rule('required|in:Self,Parents,Sponsor')]
    public $fee_sponsor;


    #[Rule('required|in:Kenyan')]
    public $nationality = 'Kenyan';


    #[Rule('required|string|max:100')]
    public $next_of_kin_name;


    #[Rule('required')]
    public $next_of_kin_number;


    #[Rule('nullable|in:TV Advertisement,Radio,Social Media,Friend/Referral')]
    public $heard_about;


    // Existing student check
    public $existingStudent = null;


    public function mount()
    {
        // Check if the user has already submitted a registration
        $this->existingStudent = Student::where('email', Auth::user()->email)->first();
    }


    public function render()
    {
        return view('livewire.student-registration', [
            'courses' => Course::all(),
            'education_levels' => EducationLevel::all(),
            'mean_grades' => [
                'A' => 'A', 
                'A-' => 'A-', 
                'B+' => 'B+', 
                'B' => 'B', 
                'B-' => 'B-'
            ],
            'course_levels' => [
                'Certificate' => 'Certificate',
                'Diploma' => 'Diploma',
                'Degree' => 'Degree'
            ],
            'fee_sponsors' => [
                'Self' => 'Self',
                'Parents' => 'Parents',
                'Sponsor' => 'Sponsor'
            ]
        ]);
    }


    public function submitRegistration()
    {
        // Validate the form
        $validatedData = $this->validate();


        // Check if student already exists
        if ($this->existingStudent) {
            session()->flash('error', 'You have already submitted a registration.');
            return;
        }


        // Create the student record (status will be pending by default)
        $student = Student::create($validatedData + [
            'status' => 'pending' // Default status
        ]);


        // Redirect or show success message
        session()->flash('success', 'Registration submitted successfully. 
            Your registration number is: ' . $student->registration_number);


        // Redirect to dashboard to show the profile
        return redirect()->route('dashboard');
    }
}