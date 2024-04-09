<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class ListTasks extends Component
{
    public function render()
    {
        $tasks = Task::with('subtasks', 'category', 'tags')
            ->where('user_id', auth()->id())
            ->whereNull('task_id')
            ->latest()
            ->get();
            
        return view('livewire.tasks.list-tasks', compact('tasks'));
    }
}
