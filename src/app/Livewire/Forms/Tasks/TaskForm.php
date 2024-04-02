<?php

namespace App\Livewire\Forms\Tasks;

use Livewire\Form;
use App\Models\Tag;
use App\Enums\Status;
use App\Enums\Priority;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class TaskForm extends Form
{
    public string $name = '';
    public string $description = '';
    public string $priority = '';
    public string $status = '';
    public int $category = 0;
    public array $tags = [];
    public string $due_date = '';
    public array $sub_tasks = [];

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'string', Rule::enum(Priority::class)],
            'status' => ['required', 'string', Rule::enum(Status::class)],
            'category' => ['nullable', 'integer', 'exists:categories,id'],
            'tags.*' => ['nullable', 'integer', 'exists:tags,id'],
            'due_date' => ['nullable', 'date'],
            'sub_tasks.*.name' => ['nullable', 'string', 'max:255'],
            'sub_tasks.*.priority' => ['nullable', 'string', Rule::enum(Priority::class)],
            'sub_tasks.*.status' => ['nullable', 'string', Rule::enum(Status::class)],
        ];
    }
}
