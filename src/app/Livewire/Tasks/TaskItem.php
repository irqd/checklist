<?php

namespace App\Livewire\Tasks;

use App\Enums\Status;
use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Modelable;

class TaskItem extends Component
{   
    #[Modelable]
    public Task $task;

    #[On('refresh-tags')]
    #[On('refresh-categories')]
    #[On('refresh-task-{task.id}')] 
    public function render()
    {
        $totalSubTasks =  $this->task->subtasks->count();
        $completedSubTasks = $this->task->subtasks->where('status', Status::COMPLETED)->count();
        $subTasksPercentage = $totalSubTasks > 0 ? ($completedSubTasks / $totalSubTasks) * 100 : 0;

        return view('livewire.tasks.task-item', compact(
            'totalSubTasks', 
            'completedSubTasks', 
            'subTasksPercentage'
        ));
    }
}
