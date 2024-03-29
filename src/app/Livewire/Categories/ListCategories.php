<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class ListCategories extends Component
{
    #[On('refresh-categories')] 
    public function render()
    {
        $categories = Category::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('livewire.categories.list-categories', compact('categories'));
    }

    public function deleteCategory($id)
    {
        try {
            DB::transaction(function () use ($id){
                $category = Category::findOrFail($id);
                $category->delete();

                $this->dispatch('notify', type: 'success', message: 'Category deleted successfully.');
                $this->dispatch('refresh-categories');
            });
        } catch (\Exception $e) {
            $this->danger('danger', 'Error deleting category');
        }
    }
}
