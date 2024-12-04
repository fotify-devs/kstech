<?php

namespace App\Livewire;
use App\Models\Gallery;
use Livewire\Component;

class FeaturedGallery extends Component
{
    public $featuredImages;


    public function mount()
    {
        $this->featuredImages = Gallery::where('is_featured', true)
            ->limit(4)
            ->get();
    }


    public function render()
    {
        return view('livewire.featured-gallery');
    }
}