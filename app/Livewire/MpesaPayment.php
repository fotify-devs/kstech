<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MpesaPayment extends Component
{
    public $phoneNumber = '';
    public $amount = null;
    public $errorMessage = '';
    public $successMessage = '';

    protected $rules = [
        'phoneNumber' => 'required|regex:/^(254)\d{9}$/',
        'amount' => 'required|numeric|min:1|max:70000'
    ];

    public function initiatePayment()
    {
        // Reset messages
        $this->errorMessage = '';
        $this->successMessage = '';
    
        // Validate input
        $this->validate();
    
        try {
            // Send request to Mpesa controller using full URL
            $response = Http::post(url('/api/mpesa/stk-push'), [
                'phone_number' => $this->phoneNumber,
                'amount' => $this->amount
            ]);
    
            // Check response
            if ($response->successful()) {
                $this->successMessage = 'Payment initiated. Please complete the transaction on your phone.';
                
                // Optional: Reset form after successful initiation
                $this->reset(['phoneNumber', 'amount']);
            } else {
                $this->errorMessage = 'Failed to initiate payment. Please try again.';
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'An error occurred: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.mpesa-payment');
    }
}