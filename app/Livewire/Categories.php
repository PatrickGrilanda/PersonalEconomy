<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Categories')]
class Categories extends Component
{
    use WithPagination;

    public $type = 'incomes';

    public function setType($type)
    {
        $this->type = $type;
    }

    public function applySearch($query)
    {
        return $query->where('type', $this->type);
    }

    public function render()
    {
        $query = Category::where('user_id', auth()->user()->id);

        $query = $this->applySearch($query);

        return view('livewire.categories', [
            'categories' => $query->paginate(5)
        ]);
    }
}
