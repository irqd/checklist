<?php

namespace App\Models;

use App\Enums\Priority;
use App\Enums\Status;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'completed_at' => 'datetime',
        'priority' => Priority::class,
        'status' => Status::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function subTasks()
    {
        return $this->hasMany(Task::class);
    }

    public function parent()
    {
        return $this->belongsTo(Task::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)
            ->withTimestamps();
    }
}
