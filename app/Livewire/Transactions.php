<?php

namespace App\Livewire;

use App\Models\Account;
use App\Models\Category;
use App\Models\CreditCard;
use App\Models\Transaction;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Transactions')]
class Transactions extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $current_month;
    public $current_year;

    public function mount()
    {
        $this->current_month = date('m');
        $this->current_year = date('Y');
    }

    public function previousMonth()
    {
        $date = Carbon::createFromDate($this->current_year, $this->current_month, 1)->subMonth();
        $this->current_month = $date->format('m');
        $this->current_year = $date->format('Y');
    }

    public function nextMonth()
    {
        $date = Carbon::createFromDate($this->current_year, $this->current_month, 1)->addMonth();
        $this->current_month = $date->format('m');
        $this->current_year = $date->format('Y');
    }

    public function render()
    {
        $transactions = Transaction::whereYear('date', $this->current_year)
            ->whereMonth('date', $this->current_month);

        return view('livewire.transactions', [
            'transactions' => $transactions->paginate(10)
        ]);
    }
}
