<?php

namespace App\Livewire\Tasks;

use App\Enums\Status;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class TaskItem extends Component
{   
    #[Reactive]
    public $task;

    public int $totalSubTasks;
    public int $completedSubTasks;
    public int $subTasksPercentage;

    public function mount($task)
    {
        $this->totalSubTasks = $task->subtasks->count();
        $this->completedSubTasks = $task->subtasks->where('status', Status::COMPLETED)->count();
        $this->subTasksPercentage = $this->computeSubTasksPercentage();
    }

    public function computeSubTasksPercentage()
    {
        $totalSubTasks = $this->totalSubTasks;
        $completedSubTasks = $this->completedSubTasks;
       
        return $totalSubTasks > 0 ? ($completedSubTasks / $totalSubTasks) * 100 : 0;
    }

    public function render()
    {
        return view('livewire.tasks.task-item');
    }
}
