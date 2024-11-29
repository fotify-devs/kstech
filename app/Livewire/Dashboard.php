<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Contracts\Auth\Authenticatable;

class Dashboard extends Component
{
    public ?Authenticatable $user = null;
    public $student = null;
    public $isRegistered = false;


    public function mount()
    {
        // Ensure user is authenticated
        $this->user = \Illuminate\Support\Facades\Auth::user();
        
        if ($this->user) {
            $this->checkRegistrationStatus();
        }
    }


    public function checkRegistrationStatus()
    {
        $this->student = Student::where('email', $this->user->email)->first();
        $this->isRegistered = $this->student !== null;
    }


    public function render()
    {
        return view('livewire.dashboard', [
            'user' => $this->user,
            'student' => $this->student,
            'isRegistered' => $this->isRegistered
        ]);
    }
}