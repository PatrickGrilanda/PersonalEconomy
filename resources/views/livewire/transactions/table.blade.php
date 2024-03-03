<div>
    <div class="flex justify-between my-2">
        <div x-data="{ open: false }" class="relative" x-on:mouseleave="open = false">
            <span
                class="w-12 h-12 shadow rounded-lg flex items-center justify-center hover:bg-slate-100 duration-200 cursor-pointer"
                x-on:click="open = !open">
                <x-icons.adjustments-horizontal class="w-8 h-8" />
            </span>
            <template x-if="open">
                <div class="rounded-lg shadow absolute z-10 min-w-64 min-h-44 top-0 start-full p-4 bg-white">
                    <h3 class="font-semibold mb-2">Filters</h3>
                    <div class="w-full p-2">
                        <x-input-label>Category</x-input-label>
                        <select class="form-input w-full" wire:model.live="category_id" placeholder="Select a category">
                            <option value="" selected>Select</option>
                            @foreach ($categories as $category)
                                <option wire:key="{{ $category->id }}" value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full p-2">
                        <x-input-label>Type</x-input-label>
                        <select class="form-input w-full" wire:model.live="type" placeholder="Select a type">
                            <option value="" selected>Select</option>
                            <option value="incomes">Income</option>
                            <option value="expenses">Expense</option>
                        </select>
                    </div>
                </div>
            </template>
        </div>
        <div class="p-2 rounded-full bg-slate-200 inline-flex  items-center gap-4 justify-between">
            <span
                class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-white duration-200 cursor-pointer"
                wire:click="previousMonth()">
                <x-icons.chevron-left class="w-4 h-4" />
            </span>
            <span>{{ $current_month }} / {{ $current_year }}</span>
            <span
                class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-white duration-200 cursor-pointer"
                wire:click="nextMonth()">
                <x-icons.chevron-right class="w-4 h-4" />
            </span>
        </div>
        <div class="w-80">
            <div class="inline-flex items-center gap-4 w-full" x-show="$wire.selectedTransactionIds.length > 0" x-cloak>
                <div>
                    <span x-text="$wire.selectedTransactionIds.length">
                    </span> {{ __('actions.selected') }}
                </div>
                <button wire:click="checkPaymentMultiple"
                    class="border rounded-xl flex gap-2 justify-center items-center text-white bg-blue-500 text-xs p-2">
                    <x-icons.like class="w-4 h-4" />
                    <span>{{ __('actions.check_payment') }}</span>
                </button>
                <button wire:click="returnToWaitingPaymentMultiple"
                    class="border rounded-xl flex gap-2 justify-center items-center p-2 text-xs">
                    <x-icons.arrow-turn-left class="w-4 h-4" />
                    <span>{{ __('actions.return') }}</span>
                </button>
            </div>
        </div>
    </div>
    @if ($category_id || $type)
        <div x-data class="rounded-full bg-orange-500 gap-4 w-full p-2 h-12 inline-flex items-center">
            @if ($category_id)
                <div class="rounded-full bg-white h-8 text-sm text-orange-700 p-2 inline-flex items-center gap-1">
                    <span x-on:click="$wire.set('category_id', '')"
                        class="rounded-full h-6 w-6 hover:bg-orange-700 flex items-center justify-center hover:text-white duration-200 cursor-pointer">X</span>
                    Category
                </div>
            @endif
            @if ($type)
                <div class="rounded-full h-8 text-sm bg-white text-orange-700 py-2 px-4 inline-flex items-center gap-2">
                    <span x-on:click="$wire.set('type', '')"
                        class="rounded-full h-6 w-6 hover:bg-orange-700 flex items-center justify-center hover:text-white duration-200 cursor-pointer">X</span>
                    Type
                </div>
            @endif
        </div>
    @endif
    <table class="table-auto border-slate-200  w-full">
        <thead class="capitalize font-medium">
            <tr>
                <th>
                    {{-- Checkboxes --}}
                </th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Account</th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Date</th>
                <th class="font-semibold text-sm p-3 text-gray-800 text-end">Amount</th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Installment</th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Period Type</th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Description</th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Category</th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Type</th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Status</th>
                <th class="font-semibold text-start text-sm p-3 text-gray-800">Ações</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @if ($transactions->count() > 0)
                @foreach ($transactions as $transaction)
                    <tr wire:key="{{ $transaction->id }}"
                        class="hover:bg-slate-100 hover:cursor-pointer duration-200 hover:shadow-lg px-4">
                        <td>
                            <div class="flex items-center justify-center">
                                <input type="checkbox" class="rounded border-gray-300 shadow cursor-pointer"
                                    wire:model.live="selectedTransactionIds" value="{{ $transaction->id }}" />
                            </div>
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{ $transaction->account_id ? $transaction->account->name : $transaction->credit_card->name }}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{ $transaction->date }}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm text-end font-semibold text-gray-500">
                            ${{ number_format($transaction->category->type->value == 'incomes' ? $transaction->value : $transaction->value * -1.0, 2) }}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{ $transaction->current_installment }} / {{ $transaction->total_installments }}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{ $transaction->period_type }}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{ str($transaction->description)->words(4) }}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{ $transaction->category->name }}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            <span
                                class="rounded-full border bg-{{ $transaction->category->type->color() }}-400 text-{{ $transaction->category->type->color() }}-900 text-xs  px-4 py-2 inline-flex gap-2 items-center">
                                <x-dynamic-component :component="'icons.' . $transaction->category->type->icon()" class="w-4 h-4" />
                                {{ $transaction->category->type->label() }}
                            </span>
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
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
                                        class="p-2 rounded-full inline-flex gap-2 text-xs items-center border">
                                        <x-icons.arrow-turn-left class="w-4 h-4" />
                                        <span> {{ __('actions.return') }}</span>
                                    </button>
                                @else
                                    <button wire:click="confirmPayment('{{ $transaction->id }}')"
                                        class="p-2 rounded-full inline-flex gap-2 text-xs items-center border bg-blue-400 hover:bg-blue-500 duration-200 text-white">
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
                    <td colspan="11" class="whitespace-nowrap p-3 text-sm text-center">
                        Nothing to see here until now ...
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="my-2">
        {{ $transactions->links('livewire.layout.pagination') }}
    </div>
</div>
