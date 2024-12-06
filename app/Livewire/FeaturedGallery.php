<?php


namespace App\Livewire;


use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;


class FeaturedGallery extends Component
{
    public $featuredImages;
    public $selectedImage = null;


    protected $listeners = ['closeModal'];


    public function mount()
    {
        $this->featuredImages = Gallery::where('is_featured', true)
            ->limit(4)
            ->get();
    }


    public function openImageModal($imageId)
    {
        $this->selectedImage = Gallery::find($imageId);
        $this->dispatch('modal-opened');
    }


    // Change this method name to match the Alpine.js call
    public function closeImageModal()
    {
        $this->selectedImage = null;
    }


    public function downloadImage()
    {
        if ($this->selectedImage) {
            $path = Storage::path($this->selectedImage->file_path);
            return response()->download($path);
        }
    }


    public function render()
    {
        return view('livewire.featured-gallery');
    }
}
