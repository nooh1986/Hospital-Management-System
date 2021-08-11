<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Livewire\Component;

class ServicesGroup extends Component
{
    
    public $index = true;
    public $name_group;
    public $notes;

    
    public function render()
    {
        return view('livewire.ServicesGroup.services-group' , ['groups' => Group::all()]);
    }

    public function add()
    {
        $this->index = false;
    }


}
