<?php

namespace App\Livewire\Transactions;

use App\Models\Account;
use App\Models\Category;
use App\Models\CreditCard;
use App\Models\Transaction;
use Illuminate\Support\Facades\Date;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Lazy()]
class Create extends Component
{
    #[Rule('required')]
    public $description;

    #[Rule('string|nullable')]
    public $account_id = null;

    #[Rule('string|nullable')]
    public $credit_card_id = null;

    #[Rule('required')]
    public $date;

    #[Rule('integer')]
    public $total_installments;

    #[Rule('required')]
    public $total_amount;

    #[Rule('string|required')]
    public $period_type;

    #[Rule('string|required')]
    public $category_id;

    public function saveTransaction()
    {
        $this->validate();

        $amount = (float)((float) $this->total_amount / (float) $this->total_installments);

        $date = Date::parse($this->date);

        for ($i = 0; $i < $this->total_installments; $i++) {

            $installmentDate = $date->copy()->addMonths($i);

            $attributes = [
                'description' => $this->description,
                'account_id' => $this->account_id,
                'credit_card_id' => $this->credit_card_id,
                'date' => $installmentDate->format('Y-m-d'),
                'total_installments' => $this->total_installments,
                'value' => $amount,
                'current_installment' => $i + 1,
                'category_id' => $this->category_id,
                'period_type' => $this->period_type,
                'status' => 'waiting payment'
            ];

            Transaction::create($attributes);
        }


        $this->reset();
        $this->alert('success', 'transaction created successfully');
    }

    public function render()
    {
        return view('livewire.transactions.create', [
            'credit_cards' => CreditCard::all(),
            'accounts' => Account::all(),
            'categories' => Category::all()
        ]);
    }
}
