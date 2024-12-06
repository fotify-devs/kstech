@extends('layouts.app')


@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto space-y-8">

            {{-- Profile Information Card --}}
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile Information
                    </h3>
                </div>
                <div class="p-6">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>


            {{-- Password Update Card --}}
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Update Password
                    </h3>
                </div>
                <div class="p-6">
                    <livewire:profile.update-password-form />
                </div>
            </div>


            {{-- Account Deletion Card --}}
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
                <div class="p-6 bg-red-50 border-b border-red-200">
                    <h3 class="text-xl font-semibold text-red-800 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6l1-1M5 7h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v0a2 2 0 002 2z"></path>
                        </svg>
                        Delete Account
                    </h3>
                </div>
                <div class="p-6">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
@endsection
