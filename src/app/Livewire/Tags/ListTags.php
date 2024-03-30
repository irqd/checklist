<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

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

    public function deleteTag($id)
    {
        try {
            DB::transaction(function () use ($id){
                $tag = Tag::findOrFail($id);
                $tag->delete();

                $this->dispatch('notify', type: 'success', message: 'Tag deleted successfully.');
                $this->dispatch('close-context');
                $this->dispatch('refresh-tags');
            });
        } catch (\Exception $e) {
            $this->danger('danger', 'Error deleting tag');
        }
    }
}
