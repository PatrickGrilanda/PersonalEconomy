<?php

namespace App\Livewire\CreditCards;

use App\Models\CreditCard;
use Livewire\Component;

class Swipper extends Component
{
    public $active_credit_card_id;
    public $active_credit_card;

    public function updatedActiveCreditCardId()
    {
        $this->active_credit_card = CreditCard::where('id', $this->active_credit_card_id)->first();
    }

    public function mount()
    {
        $credit_card = CreditCard::where('user_id', auth()->user()->id)->first();

        if ($credit_card) {
            $this->active_credit_card_id = $credit_card->id;
            $this->active_credit_card = $credit_card;
        } else {
            $this->active_credit_card_id = null;
            $this->active_credit_card = null;
        }
    }

    public function render()
    {
        return view('livewire.credit-cards.swipper', [
            'credit_cards' => CreditCard::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
