<div class="grid grid-cols-3 gap-4 w-full col-span-2">
    <x-utilities.card title="{{ __('messages.acumulated_month_balance') }}" :titleSize="'lg'" :titleStyle="'uppercase'">
        <div class="flex items-end justify-end">
            <h1 @class([
                'text-3xl font-bold',
                'text-green-500' => $accumulated_balance_month > 0,
                'text-red-500' => $accumulated_balance_month < 0,
                'text-gray-500' => $accumulated_balance_month === 0,
            ])>
                {{ formatCurrency($accumulated_balance_month) }}
            </h1>
        </div>
        <x-slot name="footer">
            <button
                class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200 flex items-center gap-2 justify-center">
                <x-icons.eye class="h-6 w-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
    <x-utilities.card title="{{ __('messages.balance_from_the_previous_month') }}" :titleSize="'lg'" :titleStyle="'uppercase'">
        <div class="flex items-end justify-end">
            <h1 @class([
                'text-3xl font-bold',
                'text-red-500' => $accumulated_balance_previous_month < 0,
                'text-green-500' => $accumulated_balance_previous_month > 0,
                'text-gray-500' => $accumulated_balance_previous_month === 0,
            ])>
                {{ formatCurrency($accumulated_balance_previous_month) }}
            </h1>
        </div>
        <x-slot name="footer">
            <button
                class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200 flex items-center gap-2 justify-center">
                <x-icons.eye class="h-6 w-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
    <x-utilities.card title="{{ __('messages.revenue_of_the_month') }}" :titleSize="'lg'" :titleStyle="'uppercase'">
        <div class="flex items-end justify-end">
            <h1 @class([
                'text-3xl font-bold',
                'text-green-500' => $month_incomes > 0,
                'text-red-500' => $month_incomes < 0,
                'text-gray-500' => $month_incomes === 0,
            ])>
                {{ formatCurrency($month_incomes) }}
            </h1>
        </div>
        <x-slot name="footer">
            <button
                class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200 flex items-center gap-2 justify-center">
                <x-icons.eye class="h-6 w-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
    <x-utilities.card title="{{ __('messages.monthly_expenses') }}" :titleSize="'lg'" :titleStyle="'uppercase'">
        <div class="flex items-end justify-end">
            <div class="flex items-end justify-end">
                <h1 @class([
                    'text-3xl font-bold',
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
                class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200 flex items-center gap-2 justify-center">
                <x-icons.eye class="h-6 w-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
    <x-utilities.card title="{{ __('messages.current_month_balance') }}" :titleSize="'lg'" :titleStyle="'uppercase'">
        <div class="flex items-end justify-end">
            <h1 @class([
                'text-3xl font-bold',
                'text-green-500' => $month_balance > 0,
                'text-red-500' => $month_balance < 0,
                'text-gray-500' => $month_balance === 0,
            ])>
                {{ formatCurrency($month_balance) }}
            </h1>
        </div>
        <x-slot name="footer">
            <button
                class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200 flex items-center gap-2 justify-center">
                <x-icons.eye class="h-6 w-6" />
                {{ __('actions.view') }}
            </button>
        </x-slot>
    </x-utilities.card>
</div>
