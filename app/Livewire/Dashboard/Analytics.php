<?php

namespace App\Livewire\Dashboard;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class Analytics extends Component
{
    public function render()
    {
        $now = Carbon::now();

        $previousMonth = $now->subMonth();
        $previousMonthYear = $previousMonth->year;
        $previousMonthNumber = $previousMonth->month;

        return view('livewire.dashboard.analytics', [
            //acumulated month balance
            'accumulated_balance_month' => Transaction::whereHas('category', function ($query) {
                $query->where('type', 'incomes');
            })
                ->whereDate('date', '<=', Carbon::now()->endOfMonth())
                ->sum('value') -
                Transaction::whereHas('category', function ($query) {
                    $query->where('type', 'expenses');
                })
                ->whereDate('date', '<=', Carbon::now()->endOfMonth())
                ->sum('value'),

            //Previous month balance
            'accumulated_balance_previous_month' =>
            Transaction::whereHas('category', function ($query) {
                $query->where('type', 'incomes');
            })
                ->whereYear('date', $previousMonthYear)
                ->whereMonth('date', $previousMonthNumber)
                ->sum('value') -
                Transaction::whereHas('category', function ($query) {
                    $query->where('type', 'expenses');
                })->whereYear('date', $previousMonthYear)
                ->whereMonth('date', $previousMonthNumber)
                ->sum('value'),

            //Month Incomes
            'month_incomes' => Transaction::whereHas('category', function ($query) {
                $query->where('type', 'incomes');
            })
                ->whereYear('date', $now->year)
                ->whereMonth('date', $now->month)
                ->sum('value'),

            //Month Expenses
            'month_expenses' => Transaction::whereHas('category', function ($query) {
                $query->where('type', 'expenses');
            })
                ->whereYear('date', $now->year)
                ->whereMonth('date', $now->month)
                ->sum('value'),

            //month balance
            'month_balance' => Transaction::whereHas('category', function ($query) {
                $query->where('type', 'incomes');
            })
                ->whereMonth('date', '=', Carbon::now()->month)
                ->whereYear('date', '=', Carbon::now()->year)
                ->sum('value') -
                Transaction::whereHas('category', function ($query) {
                    $query->where('type', 'expenses');
                })
                ->whereMonth('date', '=', Carbon::now()->month)
                ->whereYear('date', '=', Carbon::now()->year)
                ->sum('value'),
        ]);
    }
}
