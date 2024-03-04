@php

    function formatCurrency($value)
    {
        $locale = app()->getLocale();

        $currencyCodes = [
            'en' => 'USD',
            'pt-br' => 'BRL',
        ];

        $currencyCode = $currencyCodes[$locale] ?? 'USD';

        $formatter = new \NumberFormatter($locale . '@currency=' . $currencyCode, \NumberFormatter::CURRENCY);

        return $formatter->formatCurrency($value, $currencyCode);
    }

@endphp
<div class="grid w-full col-span-2 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    <x-utilities.card title="{{ __('messages.acumulated_month_balance') }}" :titleSize="'sm'" :titleStyle="'uppercase'"
        class="w-full">
        <div class="flex items-end justify-end">
            <h1 @class([
                'text-2xl font-semibold',
                'text-green-500' => $accumulated_balance_month > 0,
                'text-red-500' => $accumulated_balance_month < 0,
                'text-gray-500' => $accumulated_balance_month === 0,
            ])>
                {{ formatCurrency($accumulated_balance_month) }}
            </h1>
        </div>
        <x-slot name="footer">
            <button
                class="flex items-center justify-center w-full gap-2 p-2 duration-200 bg-gray-100 rounded-lg hover:bg-gray-300">
                <x-icons.eye class="w-6 h-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
    <x-utilities.card title="{{ __('messages.balance_from_the_previous_month') }}" :titleSize="'sm'" :titleStyle="'uppercase'"
        class="w-full">
        <div class="flex items-end justify-end">
            <h1 @class([
                'text-2xl font-semibold',
                'text-red-500' => $accumulated_balance_previous_month < 0,
                'text-green-500' => $accumulated_balance_previous_month > 0,
                'text-gray-500' => $accumulated_balance_previous_month === 0,
            ])>
                {{ formatCurrency($accumulated_balance_previous_month) }}
            </h1>
        </div>
        <x-slot name="footer">
            <button
                class="flex items-center justify-center w-full gap-2 p-2 duration-200 bg-gray-100 rounded-lg hover:bg-gray-300">
                <x-icons.eye class="w-6 h-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
    <x-utilities.card title="{{ __('messages.revenue_of_the_month') }}" :titleSize="'sm'" :titleStyle="'uppercase'"
        class="w-full">
        <div class="flex items-end justify-end">
            <h1 @class([
                'text-2xl font-semibold',
                'text-green-500' => $month_incomes > 0,
                'text-red-500' => $month_incomes < 0,
                'text-gray-500' => $month_incomes === 0,
            ])>
                {{ formatCurrency($month_incomes) }}
            </h1>
        </div>
        <x-slot name="footer">
            <button
                class="flex items-center justify-center w-full gap-2 p-2 duration-200 bg-gray-100 rounded-lg hover:bg-gray-300">
                <x-icons.eye class="w-6 h-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
    <x-utilities.card title="{{ __('messages.monthly_expenses') }}" :titleSize="'sm'" :titleStyle="'uppercase'" class="w-full">
        <div class="flex items-end justify-end">
            <div class="flex items-end justify-end">
                <h1 @class([
                    'text-2xl font-semibold',
                    'text-green-500' => $month_expenses < 0,
                    'text-red-500' => $month_expenses > 0,
                    'text-gray-500' => $month_expenses === 0,
                ])>
                    {{ formatCurrency($month_expenses) }}
                </h1>
            </div>
        </div>
        <x-slot name="footer">
            <button
                class="flex items-center justify-center w-full gap-2 p-2 duration-200 bg-gray-100 rounded-lg hover:bg-gray-300">
                <x-icons.eye class="w-6 h-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
    <x-utilities.card title="{{ __('messages.current_month_balance') }}" :titleSize="'sm'" :titleStyle="'uppercase'"
        class="w-full">
        <div class="flex items-end justify-end">
            <h1 @class([
                'text-2xl font-semibold',
                'text-green-500' => $month_balance > 0,
                'text-red-500' => $month_balance < 0,
                'text-gray-500' => $month_balance === 0,
            ])>
                {{ formatCurrency($month_balance) }}
            </h1>
        </div>
        <x-slot name="footer">
            <button
                class="flex items-center justify-center w-full gap-2 p-2 duration-200 bg-gray-100 rounded-lg hover:bg-gray-300">
                <x-icons.eye class="w-6 h-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
</div>
