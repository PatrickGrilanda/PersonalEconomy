<?php

namespace App\Livewire;

use App\Models\CreditCard;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Credit Cards')]
class CreditCards extends Component
{
    use WithPagination;

    public function render()
    {

        $query = CreditCard::where('user_id', auth()->user()->id);

        return view('livewire.credit-cards', [
            'credit_cards' => $query->paginate(10)
        ]);
    }
}
