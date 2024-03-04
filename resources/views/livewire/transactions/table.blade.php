<div>
    <div class="flex justify-between my-2">
        <div x-data="{ open: false }" class="relative" x-on:mouseleave="open = false">
            <span
                class="flex items-center justify-center w-12 h-12 duration-200 rounded-lg shadow cursor-pointer hover:bg-slate-100"
                x-on:click="open = !open">
                <x-icons.adjustments-horizontal class="w-8 h-8" />
            </span>
            <template x-if="open">
                <div class="absolute top-0 z-10 p-4 bg-white rounded-lg shadow min-w-64 min-h-44 start-full">
                    <h3 class="mb-2 font-semibold">{{ __('actions.filter') }}</h3>
                    <div class="w-full p-2">
                        <x-input-label>{{ __('additional.category') }}</x-input-label>
                        <select class="w-full form-input" wire:model.live="category_id" placeholder="Select a category">
                            <option value="" selected>{{ __('actions.select') }}</option>
                            @foreach ($categories as $category)
                                <option wire:key="{{ $category->id }}" value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full p-2">
                        <x-input-label>{{ __('additional.type') }}</x-input-label>
                        <select class="w-full form-input" wire:model.live="type" placeholder="Select a type">
                            <option value="" selected>{{ __('actions.select') }}</option>
                            <option value="incomes">{{ __('additional.incomes') }}</option>
                            <option value="expenses">{{ __('additional.expenses') }}</option>
                        </select>
                    </div>
                </div>
            </template>
        </div>
        <div class="inline-flex items-center justify-between gap-4 p-2 rounded-full bg-slate-200">
            <span
                class="flex items-center justify-center w-8 h-8 duration-200 rounded-full cursor-pointer hover:bg-white"
                wire:click="previousMonth()">
                <x-icons.chevron-left class="w-4 h-4" />
            </span>
            <span>{{ $current_month }} / {{ $current_year }}</span>
            <span
                class="flex items-center justify-center w-8 h-8 duration-200 rounded-full cursor-pointer hover:bg-white"
                wire:click="nextMonth()">
                <x-icons.chevron-right class="w-4 h-4" />
            </span>
        </div>
        <div>
            <div class="inline-flex items-center w-full gap-4" x-show="$wire.selectedTransactionIds.length > 0" x-cloak>
                <div>
                    <span x-text="$wire.selectedTransactionIds.length">
                    </span> {{ __('actions.selected') }}
                </div>
                <button wire:click="checkPaymentMultiple"
                    class="flex items-center justify-center gap-1 p-2 text-xs text-white bg-blue-500 border rounded-xl">
                    <x-icons.like class="w-4 h-4" />
                    <span>{{ __('actions.check_payment') }}</span>
                </button>
                <button wire:click="returnToWaitingPaymentMultiple"
                    class="flex items-center justify-center gap-1 p-2 text-xs border rounded-xl">
                    <x-icons.arrow-turn-left class="w-4 h-4" />
                    <span>{{ __('actions.return') }}</span>
                </button>
            </div>
        </div>
    </div>
    @if ($category_id || $type)
        <div x-data class="inline-flex items-center w-full h-12 gap-4 p-2 bg-orange-500 rounded-full">
            @if ($category_id)
                <div class="inline-flex items-center h-8 gap-1 p-2 text-sm text-orange-700 bg-white rounded-full">
                    <span x-on:click="$wire.set('category_id', '')"
                        class="flex items-center justify-center w-6 h-6 duration-200 rounded-full cursor-pointer hover:bg-orange-700 hover:text-white">X</span>
                    {{ __('additional.category') }}
                </div>
            @endif
            @if ($type)
                <div class="inline-flex items-center h-8 gap-2 px-4 py-2 text-sm text-orange-700 bg-white rounded-full">
                    <span x-on:click="$wire.set('type', '')"
                        class="flex items-center justify-center w-6 h-6 duration-200 rounded-full cursor-pointer hover:bg-orange-700 hover:text-white">X</span>
                    {{ __('additional.type') }}
                </div>
            @endif
        </div>
    @endif
    <table class="w-full table-auto border-slate-200">
        <thead class="font-medium capitalize">
            <tr>
                <th>
                    <div class="flex items-center justify-center">
                        <x-transactions.check-all />
                    </div>
                </th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.account') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.date') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-end">{{ __('additional.amount') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.installment') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.period_type') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.description') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.category') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.type') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.status') }}</th>
                <th class="p-3 text-sm font-semibold text-gray-800 text-start">{{ __('additional.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @if ($transactions->count() > 0)
                @foreach ($transactions as $transaction)
                    <tr wire:key="{{ $transaction->id }}"
                        class="px-4 duration-200 hover:bg-slate-100 hover:cursor-pointer hover:shadow-lg">
                        <td>
                            <div class="flex items-center justify-center">
                                <input type="checkbox" class="border-gray-300 rounded shadow cursor-pointer"
                                    wire:model.live="selectedTransactionIds" value="{{ $transaction->id }}" />
                            </div>
                        </td>
                        <td class="p-3 text-sm whitespace-nowrap">
                            {{ $transaction->account_id ? $transaction->account->name : $transaction->credit_card->name }}
                        </td>
                        <td class="p-3 text-sm whitespace-nowrap">
                            {{ $transaction->date }}
                        </td>
                        <td class="p-3 text-sm font-semibold text-gray-500 whitespace-nowrap text-end">
                            ${{ number_format($transaction->value, 2) }}
                        </td>
                        <td class="p-3 text-sm whitespace-nowrap">
                            {{ $transaction->current_installment }} / {{ $transaction->total_installments }}
                        </td>
                        <td class="p-3 text-sm whitespace-nowrap">
                            {{ $transaction->period_type }}
                        </td>
                        <td class="p-3 text-sm whitespace-nowrap">
                            {{ str($transaction->description)->words(4) }}
                        </td>
                        <td class="p-3 text-sm whitespace-nowrap">
                            {{ $transaction->category->name }}
                        </td>
                        <td class="p-3 text-sm whitespace-nowrap">
                            <span
                                class="rounded-full border bg-{{ $transaction->category->type->color() }}-400 text-{{ $transaction->category->type->color() }}-900 text-xs  px-4 py-2 inline-flex gap-2 items-center">
                                <x-dynamic-component :component="'icons.' . $transaction->category->type->icon()" class="w-4 h-4" />
                                {{ $transaction->category->type->label() }}
                            </span>
                        </td>
                        <td class="p-3 text-sm whitespace-nowrap">
                            <span
                                class="rounded-full border bg-{{ $transaction->status->color() }}-500 text-xs text-white px-4 py-2 inline-flex gap-2 items-center">
                                <x-dynamic-component :component="'icons.' . $transaction->status->icon()" class="w-4 h-4" />
                                <span>{{ $transaction->status->label() }}</span>
                            </span>
                        </td>
                        <td>
                            <div class="flex items-center justify-center">
                                @if ($transaction->status->value !== 'waiting payment')
                                    <button wire:click="returnToWaitingPayment('{{ $transaction->id }}')"
                                        class="inline-flex items-center gap-1 p-2 text-xs border rounded-full">
                                        <x-icons.arrow-turn-left class="w-4 h-4" />
                                        <span> {{ __('actions.return') }}</span>
                                    </button>
                                @else
                                    <button wire:click="confirmPayment('{{ $transaction->id }}')"
                                        class="inline-flex items-center gap-1 p-2 text-xs text-white duration-200 bg-blue-500 border rounded-full hover:bg-blue-700">
                                        <x-icons.like class="w-4 h-4" />
                                        <span> {{ __('actions.check_payment') }}</span>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="11" class="p-3 text-sm text-center whitespace-nowrap">
                        {{ __('messages.nothing_to_show') }}
                    </td>
                </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <th>Total</th>
                <td></td>
                <th class="p-3 text-sm font-semibold text-gray-800 whitespace-nowrap text-end">
                    ${{ number_format($transactions->sum('value'), 2) }}
                </th>
                <td colspan="7">
                </td>
            </tr>
        </tfoot>
    </table>
    <div class="my-2">
        {{ $transactions->links('livewire.layout.pagination') }}
    </div>
</div>
