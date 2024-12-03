<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
class StudentProfile extends Component
{
    public $student = null;


    public function mount()
    {
        $this->student = Student::where('email', Auth::user()->email)->first();
    }


    public function render()
    {
        return view('livewire.student-profile');
    }
}
