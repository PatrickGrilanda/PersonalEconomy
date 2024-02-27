<?php

namespace App\Livewire;

use App\Models\Account;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Accounts')]
class Accounts extends Component
{
    use WithPagination;

    public $search = '';

    public function searchUpdated()
    {
    }

    public function render()
    {
        return view('livewire.accounts', [
            'accounts' => Account::paginate(5)
        ]);
    }
}
