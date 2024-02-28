<?php

namespace App\Enum\Transaction;

enum TransactionStatus: string
{
    case WAITING_PAYMENT = 'waiting payment';
    case PAID = 'paid';
    case RECEIVED = 'received';

    public function color()
    {
        return match ($this) {
            static::WAITING_PAYMENT => 'amber',
            static::PAID => 'green',
            static::RECEIVED => 'green'
        };
    }

    public function label()
    {
        return match ($this) {
            static::WAITING_PAYMENT => 'Waiting Payment',
            static::PAID => 'Paid',
            static::RECEIVED => 'Received'
        };
    }

    public function icon()
    {
        return match ($this) {
            static::WAITING_PAYMENT => 'clock',
            static::PAID => 'check',
            static::RECEIVED => 'check',
        };
    }
}
