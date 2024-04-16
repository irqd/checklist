<?php

namespace App\Livewire\Tasks\Filters;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class TaskDate extends Component
{   
    #[Modelable]
    public string $dateRange = 'today';
    
    public function render()
    {
        return view('livewire.tasks.filters.task-date');
    }
}
