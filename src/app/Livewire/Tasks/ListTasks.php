<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ListTasks extends Component
{   
    use WithPagination;

    #[On('refresh-tasks')]
    public function render()
    {
        $tasks = Task::with('subtasks', 'category', 'tags')
            ->where('user_id', auth()->id())
            ->whereNot('is_subtask', true)
            ->latest()
            ->paginate(9);

        return view('livewire.tasks.list-tasks', compact('tasks'));
    }
}
