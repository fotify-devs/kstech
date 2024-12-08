<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Collaborator;

class CollaboratorsMarquee extends Component
{
    // Configurable properties
    public $animationSpeed = 20; // seconds
    public $logoMaxWidth = 150; // px
    public $logoMaxHeight = 100; // px
    public $direction = 'left'; // left or right


    public $collaborators;


    public function mount()
    {
        $this->collaborators = Collaborator::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }


    // Method to dynamically set animation speed
    public function setAnimationSpeed(int $speed)
    {
        $this->animationSpeed = $speed;
    }


    // Method to set marquee direction
    public function setDirection(string $direction)
    {
        $this->direction = in_array($direction, ['left', 'right']) ? $direction : 'left';
    }


    public function render()
    {
        return view('livewire.frontend.collaborators-marquee');
    }
}
