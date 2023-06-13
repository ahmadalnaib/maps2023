<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BasicModal extends Component
{
    public $showModal = false;

    public function render()
    {
        return view('livewire.basic-modal');
    }
    
    public function openModal()
    {
        $this->showModal = true;
    }
    
    public function closeModal()
    {
        $this->showModal = false;
    }
}
