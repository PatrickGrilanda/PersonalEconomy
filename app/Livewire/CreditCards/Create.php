<?php

namespace App\Livewire\CreditCards;

use App\Models\CreditCard;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Credit Card')]
class Create extends Component
{
    use LivewireAlert;

    #[Rule('string|required')]
    public String $name;

    #[Rule('required')]
    public float $limit;

    #[Rule('integer|required')]
    public int $invoice_closing_date;

    #[Rule('integer|required')]
    public int $invoice_due_date;

    public function saveCreditCard()
    {
        $this->validate();

        $attributes = [
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'limit' => $this->limit,
            'invoice_closing_date' => $this->invoice_closing_date,
            'invoice_due_date' => $this->invoice_due_date
        ];

        CreditCard::create($attributes);

        $this->reset();
        $this->alert('success', 'Credit card created successfully');
    }

    public function render()
    {
        return view('livewire.credit-cards.create');
    }
}
