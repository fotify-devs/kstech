@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900">
                    {{-- Render Livewire Components --}}
                    @if ($student = App\Models\Student::where('email', Auth::user()->email)->first())
                        <livewire:student-profile />
                        {{-- <div class="container mx-auto mt-10">
                            <livewire:mpesa-payment />
                        </div> --}}
                    @else
                        <livewire:student-registration />
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

