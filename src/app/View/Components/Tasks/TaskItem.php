<?php

namespace App\View\Components\Tasks;

use App\Models\Task;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskItem extends Component
{   
    public int $totalSubTasks;
    public int $completedSubTasks;
    public int $subTasksPercentage;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public Task $task,
    )
    {
        $this->totalSubTasks = $task->subtasks->count();
        $this->completedSubTasks = $task->subtasks->where('status', 'completed')->count();
        $this->subTasksPercentage = $this->computeSubTasksPercentage();
    }

    public function computeSubTasksPercentage()
    {
        $totalSubTasks = $this->totalSubTasks;
        $completedSubTasks = $this->completedSubTasks;
       
        return $totalSubTasks > 0 ? ($completedSubTasks / $totalSubTasks) * 100 : 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tasks.task-item');
    }
}
