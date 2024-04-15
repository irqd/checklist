<?php

namespace App\Livewire\Tasks\Filters;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class TaskPriority extends Component
{
    #[Modelable]
    public string $priority = 'low';

    public function render()
    {
        return view('livewire.tasks.filters.task-priority');
    }
}
