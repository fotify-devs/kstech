<div class="dashboard-container">
    @if($isRegistered)
        {{-- Render Student Profile Component --}}
        <livewire:student-profile :student="$student" />
    @else
        {{-- Render Student Registration Component --}}
        <livewire:student-registration />
    @endif
</div>