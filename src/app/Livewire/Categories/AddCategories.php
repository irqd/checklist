<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AddCategories extends Component
{
    public string $name = '';
    public string $hex_color = '#007bff';
    
    public function render()
    {
        return view('livewire.categories.add-categories');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'hex_color' => 'required|string|max:255',
        ]);

        try {
            DB::transaction(function () {
                Category::create([
                    'user_id' => auth()->id(),
                    'name' => ucfirst($this->name),
                    'hex_color' => $this->hex_color,
                ]);
            });

            $this->reset();
            $this->dispatch('notify', type: 'success', message: 'Category added successfully.');
            $this->dispatch('refresh-categories');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'danger', message: 'Failed to add category.'
            );
        }
    }
}
