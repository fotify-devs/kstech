<?php

namespace App\Livewire\Frontend;

use App\Models\Carousel;
use Livewire\Component;

class HomeCarousel extends Component
{
    public $carousels;


    public function mount()
    {
        $this->carousels = Carousel::active()->get();
    }


    public function render()
    {
        return view('livewire.frontend.home-carousel');
    }
}