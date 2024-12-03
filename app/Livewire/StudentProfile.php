<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
class StudentProfile extends Component
{
    public $student = null;


    // public function stkPush($phoneNumber)
    // {
    //     try {
    //         // Assuming you want to use the account number as the student's registration number
    //         $response = Mpesa::stkpush(
    //             $phoneNumber,
    //             1, // Amount is KSh 1
    //             $this->student->registration_number // Use registration number as account identifier
    //         );


    //         // If payment is successful, update student status
    //         if ($response['ResponseCode'] === '0') {
    //             $this->student->status = 'approved';
    //             $this->student->save();
    //         }


    //         return $response;
    //     } catch (\Exception $e) {
    //         // Handle any errors
    //         return [
    //             'ResponseCode' => '1',
    //             'ResponseDescription' => $e->getMessage()
    //         ];
    //     }
    // }

    public function mount()
    {
        $this->student = Student::where('email', Auth::user()->email)->first();
    }


    public function render()
    {
        return view('livewire.student-profile');
    }
}
