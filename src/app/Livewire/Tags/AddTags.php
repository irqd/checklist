<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddTags extends Component
{   
    public string $name = '';
    public string $hex_color = '#007bff';

    public function render()
    {
        return view('livewire.tags.add-tags');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'hex_color' => 'required|string|max:255',
        ]);

        try {
            DB::transaction(function () {
                Tag::create([
                    'user_id' => auth()->id(),
                    'name' => ucfirst($this->name),
                    'hex_color' => $this->hex_color,
                ]);
            });

            $this->reset();
            $this->dispatch('notify', type: 'success', message: 'Tag added successfully.');
            $this->dispatch('add-close');
            $this->dispatch('refresh-tags');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'danger', message: 'Failed to add tag.');
        }
    }
}
