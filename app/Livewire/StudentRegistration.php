<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Course;
use App\Models\EducationLevel;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentRegistration extends Component
{
    // Form fields
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $course_id = null;
    public $education_level_id = null;
    public $mean_grade = '';
    public $fee_sponsor = '';
    public $course_level = '';
    public $nationality = 'Kenyan';
    public $next_of_kin_name = '';
    public $next_of_kin_number = '';
    public $heard_about = '';


    // Dropdown options
    public $courses = [];
    public $education_levels = [];


    // State tracking
    public $has_existing_registration = false;


    public function mount()
    {
        // Check if user already has a student registration
        $existing_student = Student::where('email', Auth::user()->email)->first();
        
        if ($existing_student) {
            $this->has_existing_registration = true;
        }


        // Populate dropdowns
        $this->courses = Course::all();
        $this->education_levels = EducationLevel::all();
    }


    public function rules()
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:students,email',
            'phone' => [
                'required', 
                'regex:/^(?:254|\+254|0)([7])([0-9]{8})$/'
            ],
            'course_id' => 'required|exists:courses,id',
            'education_level_id' => 'required|exists:education_levels,id',
            'mean_grade' => 'required|in:A,A-,B+,B,B-',
            'fee_sponsor' => 'required|in:Self,Parents,Sponsor',
            'course_level' => 'required|in:Certificate,Diploma,Degree',
            'nationality' => 'required|in:Kenyan',
            'next_of_kin_name' => 'required|string|max:100',
            'next_of_kin_number' => [
                'required', 
                'regex:/^(?:254|\+254|0)([7])([0-9]{8})$/'
            ],
            'heard_about' => 'nullable|in:TV Advertisement,Radio,Social Media,Friend/Referral',
        ];
    }


    public function messages()
    {
        return [
            'phone.regex' => 'Please enter a valid Kenyan phone number.',
            'next_of_kin_number.regex' => 'Please enter a valid Kenyan phone number for next of kin.',
        ];
    }


    public function submitRegistration()
    {
        // Validate input
        $validatedData = $this->validate();


        // Check if user already has a registration
        $existing_student = Student::where('email', Auth::user()->email)->first();
        if ($existing_student) {
            session()->flash('error', 'You have already submitted a registration.');
            return;
        }


        // Create student record
        $student = Student::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'course_id' => $this->course_id,
            'education_level_id' => $this->education_level_id,
            'mean_grade' => $this->mean_grade,
            'fee_sponsor' => $this->fee_sponsor,
            'course_level' => $this->course_level,
            'nationality' => $this->nationality,
            'next_of_kin_name' => $this->next_of_kin_name,
            'next_of_kin_number' => $this->next_of_kin_number,
            'heard_about' => $this->heard_about,
            'status' => 'pending' // Default status
        ]);


        // Redirect or show success message
        session()->flash('success', 'Registration submitted successfully. Your application is pending approval.');
        
        // Refresh the component to show profile or prevent re-submission
        return redirect()->route('dashboard');
    }


    public function render()
    {
        return view('livewire.student-registration');
    }
}