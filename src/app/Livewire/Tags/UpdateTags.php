<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;
use Livewire\Attributes\On;

class UpdateTags extends Component
{   
    public Tag $tag;
    public string $name = '';
    public string $hex_color = '';

    public function render()
    {
        return view('livewire.tags.update-tags');
    }

    #[On('update-tag')] 
    public function getCategory($id)
    {
        $this->tag = Tag::findOrFail($id);
        $this->name = $this->tag->name;
        $this->hex_color = $this->tag->hex_color;

        $this->dispatch('update-open');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'hex_color' => 'required|string|max:255',
        ]);

        try {
            $this->tag->update([
                'name' => ucfirst($this->name),
                'hex_color' => $this->hex_color,
            ]);

            $this->dispatch('notify', type: 'success', message: 'Tag updated successfully.');
            $this->dispatch('refresh-tags');
            $this->dispatch('refresh-tasks');
            $this->dispatch('update-close');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'danger', message: 'Failed to update tag.');
        }
    }
}
