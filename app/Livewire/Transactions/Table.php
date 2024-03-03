<?php

namespace App\Livewire\Transactions;

use App\Enum\Transaction\TransactionStatus;
use App\Livewire\Transactions;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy()]
class Table extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $current_month;
    public $current_year;

    public $category_id = '';

    public $type = '';

    public $selectedTransactionIds = [];

    public function mount()
    {
        $this->current_month = date('m');
        $this->current_year = date('Y');
    }

    public function confirmPayment(Transaction $transaction)
    {
        $transaction->status = $transaction->category->type->value == 'incomes' ? TransactionStatus::RECEIVED->value : TransactionStatus::PAID->value;
        if ($transaction->save()) {
            $this->alert('success', __('messages.transaction_paid_successfully'));
        } else {
            $this->alert('error', __('messages.transaction_paid_fail'));
        }
    }

    public function checkPaymentMultiple()
    {
        $transactions = Transaction::whereIn('id', $this->selectedTransactionIds)->get();

        foreach ($transactions as $transaction) {
            $this->confirmPayment($transaction);
        }
    }

    public function returnToWaitingPayment(Transaction $transaction)
    {
        $transaction->status = TransactionStatus::WAITING_PAYMENT->value;
        if ($transaction->save()) {
            $this->alert('success', __('messages.transaction_returned_successfully'));
        } else {
            $this->alert('error', __('messages.transaction_returned_fail'));
        }
    }

    public function returnToWaitingPaymentMultiple()
    {
        $transactions = Transaction::whereIn('id', $this->selectedTransactionIds)->get();

        foreach ($transactions as $transaction) {
            $this->returnToWaitingPayment($transaction);
        }
    }

    public function updatedCategoryId()
    {
        $this->resetPage();
    }

    public function updatedType()
    {
        $this->resetPage();
    }

    public function updatedCurrentMonth()
    {
        $this->resetPage();
    }

    protected function applyCategoryFilter($query)
    {
        return $this->category_id === ''
            ? $query
            : $query->where('category_id', $this->category_id);
    }

    protected function applyTypeFilter($query)
    {
        return $this->type === ''
            ? $query
            : $query->whereHas('category', function ($query) {
                $query->where('type', $this->type);
            });
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
        $query = Transaction::whereYear('date', $this->current_year)
            ->whereMonth('date', $this->current_month);

        $query = $this->applyCategoryFilter($query);

        $query = $this->applyTypeFilter($query);

        return view('livewire.transactions.table', [
            'transactions' => $query->paginate(10),
            'categories' => Category::all()
        ]);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
        Loading table ...
        </div>
        HTML;
    }
}
