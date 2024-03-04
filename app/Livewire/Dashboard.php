<?php

namespace App\Livewire;

use App\Models\CreditCard;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public $credit_card_id;

    public function updatedCreditCardId()
    {
        //dd('mudou');
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'credit_cards' => CreditCard::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
