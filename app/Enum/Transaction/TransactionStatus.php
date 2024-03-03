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
            static::WAITING_PAYMENT => 'gray',
            static::PAID => 'blue',
            static::RECEIVED => 'blue'
        };
    }

    public function label()
    {
        return match ($this) {
            static::WAITING_PAYMENT => __('status.waiting_payment'),
            static::PAID => __('status.paid'),
            static::RECEIVED => __('status.received')
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
