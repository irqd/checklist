<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ListTasks extends Component
{   
    use WithPagination;

    public string $status = 'pending';
    public string $priority = 'low';

    #[On('refresh-tasks')]
    public function render()
    {
        $tasks = Task::with('subtasks', 'category', 'tags')
            ->where('user_id', auth()->id())
            ->when($this->status, function ($query, $status) {
                if($this->status == 'all') {
                    return $query;
                }

                return $query->where('status', $status);
            })
            ->when($this->priority, function ($query, $priority) {
                if($this->priority == 'all') {
                    return $query;
                }

                return $query->where('priority', $priority);
            })
            ->whereNot('is_subtask', true)
            ->latest()
            ->paginate(9);

        return view('livewire.tasks.list-tasks', compact('tasks'));
    }
}
