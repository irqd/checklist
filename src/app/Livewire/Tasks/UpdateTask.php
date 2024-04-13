<?php

namespace App\Livewire\Tasks;

use App\Models\Tag;
use App\Models\Task;
use App\Enums\Status;
use App\Enums\Priority;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Livewire\Forms\Tasks\TaskForm;

class UpdateTask extends Component
{
    public TaskForm $form;

    public function render()
    {
        $categories = Category::select('id', 'name', 'hex_color')
            ->where('user_id', auth()->id())
            ->get();

        $tags = Tag::select('id', 'name', 'hex_color')
            ->where('user_id', auth()->id())
            ->get();

        return view('livewire.tasks.update-task', compact('categories', 'tags'));
    }

    #[On('set-task')]
    public function setTask($id)
    {
        $task = Task::findOrFail($id);

        $this->form->setTask($task);
    }

    public function addSubTask()
    {
        $this->form->sub_tasks[] = [
            'id' => null,
            'is_editing' => true,
            'is_subtask' => true,
            'title' => null,
            'priority' => Priority::LOW,
            'status' => Status::PENDING,
        ];
    }

    public function editSubTask($index)
    {
        $this->form->sub_tasks[$index]['is_editing'] = true;
    }

    public function cancelEditSubTask($index)
    {   
        unset($this->form->sub_tasks[$index]);
    }

    public function saveEditSubTask($index)
    {
        $this->form->validateOnly("sub_tasks.{$index}.title");
        $this->form->validateOnly("sub_tasks.{$index}.priority");
        $this->form->validateOnly("sub_tasks.{$index}.status");

        $this->form->sub_tasks[$index]['is_editing'] = false;
    }

    public function checkSubTaskProgress()
    {
        $totalSubTasks =  count($this->form->sub_tasks);
        $completedSubTasks = count(array_filter($this->form->sub_tasks, function ($subTask) {
            return $subTask['status'] === Status::COMPLETED;
        }));

        if($totalSubTasks === $completedSubTasks) {
            $this->form->status = Status::COMPLETED;
        } else if($completedSubTasks > 0) {
            $this->form->status = Status::IN_PROGRESS;
        } else {
            $this->form->status = Status::PENDING;
        }
    }

    public function save()
    {
        $this->form->validate();
        
        try {
            $this->form->update();

            $this->dispatch('notify', type: 'success', message: 'Task updated successfully');
            $this->dispatch('refresh-task-' . $this->form->task->id);
            $this->dispatch('hide-task-form', 'update-task');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'danger', message: 'Something went wrong. Please try again.' . $e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->form->resetForm();
    }
}
