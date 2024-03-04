<?php

namespace App\Livewire\Transactions;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class Chart extends Component
{
    public $dataset = [];
    public $chartType = 'bar';
    public $options = [
        'scales' => [
            'y' => [
                'beginAtZero' => true,
            ]
        ]
    ];

    public function mount($chartType = null, $options = null)
    {
        $this->fillDataset();

        if ($chartType != null) {
            $this->chartType = $chartType;
        }

        if ($options != null) {
            $this->options = $options;
        }
    }

    public function fillDataset()
    {

        $currentYear = Carbon::now()->year;

        $transactions = Transaction::whereIn('category_id', auth()->user()->categories->pluck('id')->toArray())
            ->whereRaw('YEAR(date) = ?', [$currentYear])
            ->selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(value) as total_amount')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $this->dataset['values'] = $transactions->pluck('total_amount');
        $this->dataset['labels'] = $transactions->map(function ($item) {
            $monthName = __("months." . $item->month);
            return $monthName . ' ' . $item->year;
        });
    }

    public function render()
    {
        return view('livewire.transactions.chart');
    }
}
