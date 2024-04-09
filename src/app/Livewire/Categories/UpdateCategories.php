<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;

class UpdateCategories extends Component
{   
    public Category $category;
    public string $name = '';
    public string $hex_color = '';
    
    public function render()
    {
        return view('livewire.categories.update-categories');
    }

    #[On('update-category')] 
    public function getCategory($id)
    {
        $this->category = Category::findOrFail($id);
        $this->name = $this->category->name;
        $this->hex_color = $this->category->hex_color;

        $this->dispatch('update-open');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'hex_color' => 'required|string|max:255',
        ]);

        try {
            $this->category->update([
                'name' => ucfirst($this->name),
                'hex_color' => $this->hex_color,
            ]);

            $this->dispatch('notify', type: 'success', message: 'Category updated successfully.');
            $this->dispatch('refresh-categories');
            $this->dispatch('refresh-tasks');
            $this->dispatch('update-close');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'danger', message: 'Failed to update category.');
        }
    }
}
