<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;

class Widget extends Component
{
    public $show;

    public function mount($show)
    {
        $this->show = $show;
    }

    public function render()
    {
        return view('livewire.admin.components.widget');
    }
}
