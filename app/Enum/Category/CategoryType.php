<?php


namespace App\Enum\Category;

enum CategoryType: string
{
    case EXPENSES = 'expenses';
    case INCOMES = 'incomes';

    public function color()
    {
        return match ($this) {
            static::EXPENSES => 'red',
            static::INCOMES => 'green',
        };
    }

    public function label()
    {
        return match ($this) {
            static::EXPENSES => 'Expense',
            static::INCOMES => 'Income',
        };
    }

    public function icon()
    {
        return match ($this) {
            static::EXPENSES => 'arrow-trending-down',
            static::INCOMES => 'banknotes',
        };
    }
}
