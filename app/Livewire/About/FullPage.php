<?php


namespace App\Livewire\About;


use App\Models\About;
use Livewire\Component;


class FullPage extends Component
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
        return view('livewire.about.full-page', [
            'about' => $this->about
        ]);
    }
}