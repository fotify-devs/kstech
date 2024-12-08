<?php

namespace App\Livewire\About;

use Livewire\Component;
use App\Models\About;
use Illuminate\Support\Str;

class HomeSection extends Component
{
    public $about;
    public $showVideo = false;


    public function mount()
    {
        $this->about = About::first();
    }


    public function toggleVideo()
    {
        $this->showVideo = !$this->showVideo;
    }


    public function render()
    {
        return view('livewire.about.home-section', [
            'about' => $this->about,
            'limitedAboutText' => Str::limit($this->about?->about_text ?? '', 200)
        ]);
    }
}