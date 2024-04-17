<?php

namespace App\Livewire\Forms\Tasks;

use Livewire\Form;
use App\Models\Tag;
use App\Models\Task;
use App\Enums\Status;
use App\Enums\Priority;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class TaskForm extends Form
{
    public ?Task $task;

    public ?string $title = '';
    public ?string $description = '';
    public ?Priority $priority = Priority::LOW;
    public ?Status $status = Status::PENDING;
    public ?int $category_id;
    public ?array $tags = [];
    public ?string $due_date = null;
    public ?array $sub_tasks = [];

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    public function setTask(Task $task)
    {
        $this->task = $task;

        $this->title = $task->title;
        $this->description = $task->description;
        $this->priority = $task->priority;
        $this->status = $task->status;
        $this->category_id = $task->category_id;
        $this->tags = $task->tags->pluck('id')->toArray();
        $this->due_date = $task->due_date;
        $this->sub_tasks = $task->subTasks->map(function ($subTask) {
            return [
                'id' => $subTask->id,
                'is_editing' => false,
                'is_subtask' => true,
                'title' => $subTask->title,
                'priority' => $subTask->priority,
                'status' => $subTask->status,
            ];
        })->toArray();
    }

    public function store()
    {   
        DB::transaction(function () {
            $task = Task::create(
                $this->only('title', 'description', 'priority', 'status', 'category_id', 'due_date')
            );

            $task->tags()->attach($this->tags);
    
            if(!empty($this->sub_tasks)) {
                $task->subTasks()->createMany($this->sub_tasks);
            }
        });
    }

    public function update()
    {
        DB::transaction(function () {
            $this->due_date == "" ? $this->due_date = null : $this->due_date;

            $this->task->update(
                $this->only('title', 'description', 'priority', 'status', 'category_id', 'due_date')
            );

            $this->task->tags()->sync($this->tags);
            
            // filters out sub tasks with null id
            $ids = collect($this->sub_tasks)->pluck('id')->filter(function ($id) {
                return !is_null($id);
            })->toArray();

            // deletes the subtasks that are not in the ids array
            $this->task->subTasks()->whereNotIn('id', $ids)->delete();

            // updates or creates the subtasks array
            foreach ($this->sub_tasks as $subTask) {
                $this->task->subTasks()->updateOrCreate(
                    ['id' => $subTask['id']],
                    $subTask
                );
            }
        });
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', Rule::enum(Priority::class)],
            'status' => ['required', Rule::enum(Status::class)],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tags.*' => ['nullable', 'integer', 'exists:tags,id'],
            'due_date' => ['required', 'date'],
            'sub_tasks.*.title' => [
                Rule::requiredIf(fn () => ! empty($this->sub_tasks)),
                'string', 
                'max:255'
            ],
            'sub_tasks.*.priority' => [
                Rule::requiredIf(fn () => ! empty($this->sub_tasks)),
                Rule::enum(Priority::class)
            ],
            'sub_tasks.*.status' => [
                Rule::requiredIf(fn () => ! empty($this->sub_tasks)),
                Rule::enum(Status::class)
            ],
        ];
    }

    public function messages()
    {
        return [
            'sub_tasks.*.title.required' => 'The sub task title field is required.',
            'sub_tasks.*.title.string' => 'The sub task title must be a string.',
            'sub_tasks.*.title.max' => 'The sub task title may not be greater than 255 characters.',
            'sub_tasks.*.priority.required' => 'The sub task priority field is required.',
            'sub_tasks.*.priority.enum' => 'The sub task priority must be one of: ' . implode(', ', Priority::toArray()),
            'sub_tasks.*.status.required' => 'The sub task status field is required.',
            'sub_tasks.*.status.enum' => 'The sub task status must be one of: ' . implode(', ', Status::toArray()),
        ];
    }
}
