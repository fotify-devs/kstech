<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;


class GalleryPage extends Component
{
    use WithPagination;


    public $filter = 'all';


    public function render()
    {
        $query = Gallery::query();


        if ($this->filter === 'featured') {
            $query->where('is_featured', true);
        }


        $galleries = $query->paginate(8);


        return view('livewire.gallery-page', [
            'galleries' => $galleries
        ]);
    }


    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }
}
