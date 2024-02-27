<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Category')]
class Create extends Component
{
    use LivewireAlert;

    #[Rule('string|required')]
    public $name;

    #[Rule('required|in:incomes,expenses')]
    public $type = 'incomes';


    public function saveCategory()
    {
        $this->validate();

        $attributes = [
            'name' => $this->name,
            'type' => $this->type,
            'user_id' => auth()->user()->id
        ];

        Category::create($attributes);

        $this->reset();
        $this->alert('success', 'Category created sucessfully');
    }

    public function render()
    {
        return view('livewire.categories.create');
    }
}
