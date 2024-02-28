<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Show Category')]
class Show extends Component
{
    public Category $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.categories.show');
    }
}
