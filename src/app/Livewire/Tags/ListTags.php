<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;
use Livewire\Attributes\On;

class ListTags extends Component
{   
    #[On('refresh-tags')] 
    public function render()
    {
        $tags = Tag::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('livewire.tags.list-tags', compact('tags'));
    }
}
