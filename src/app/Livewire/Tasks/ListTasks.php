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

    public string $dateRange = '';
    public string $from = '';
    public string $to = '';

    public function mount()
    {
        $this->dateRange = 'today';
        $this->updatedDateRange();
    }

    public function updatedDateRange()
    {
        switch($this->dateRange) {
            case 'all':
                $this->from = '';
                $this->to = '';
                break;
            case 'today':
                $this->from = now()->format('Y-m-d');
                $this->to = now()->format('Y-m-d');
                break;
            case 'this_week':
                $this->from = now()->startOfWeek()->format('Y-m-d');
                $this->to = now()->endOfWeek()->format('Y-m-d');
                break;
            case 'this_month':
                $this->from = now()->startOfMonth()->format('Y-m-d');
                $this->to = now()->endOfMonth()->format('Y-m-d');
                break;
            case 'custom':
                $this->from = '';
                $this->to = '';
                break;
            default:
                $this->from = now()->format('Y-m-d');
                $this->to = now()->format('Y-m-d');
                break;
        }
    }

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
            ->when($this->from && $this->to, function ($query) {
                if($this->dateRange == 'all') {
                    return $query;
                }

                return $query->whereBetween('created_at', [$this->from, $this->to]);
            })
            ->whereNot('is_subtask', true)
            ->latest()
            ->paginate(9);

        return view('livewire.tasks.list-tasks', compact('tasks'));
    }
}
