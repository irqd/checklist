<?php

namespace App\Livewire\Tasks\Filters;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class TaskStatus extends Component
{
    #[Modelable]
    public string $status = 'pending';

    public function render()
    {
        return view('livewire.tasks.filters.task-status');
    }
}
