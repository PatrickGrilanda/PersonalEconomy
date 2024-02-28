<div>
    <div class="flex justify-center w-full h-full">
        <div class="lg:w-[75rem] bg-white rounded-2xl shadow my-4 p-4">
            <div class="flex justify-between my-2">
                <div x-data="{ open: false }" class="relative" x-on:mouseleave="open = false">
                    <span
                        class="w-12 h-12 shadow rounded-lg flex items-center justify-center hover:bg-slate-100 duration-200 cursor-pointer"
                        x-on:click="open = !open">
                        <x-icons.adjustments-horizontal class="w-8 h-8" />
                    </span>
                    <template x-if="open">
                        <div class="rounded-lg shadow absolute z-10 min-w-44 minh-44 top-0 start-full p-4">
                            Dropdown
                        </div>
                    </template>
                </div>
                <div class="p-2 rounded-full bg-slate-200 inline-flex items-center gap-4 justify-between">
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
                <span>
                </span>
            </div>
            <table class="table-auto border-slate-200  w-full">
                <thead class="capitalize font-medium">
                    <tr>
                        <th class="font-semibold text-start text-sm p-3 text-gray-800">Account</th>
                        <th class="font-semibold text-start text-sm p-3 text-gray-800">Date</th>
                        <th class="font-semibold text-start text-sm p-3 text-gray-800">Amount</th>
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
                            <tr wire:key="{{ $transaction->id }}">
                                <td class="whitespace-nowrap p-3 text-sm">
                                    {{ $transaction->account_id ? $transaction->account->name : $transaction->credit_card->name }}
                                </td>
                                <td class="whitespace-nowrap p-3 text-sm">
                                    {{ $transaction->date }}
                                </td>
                                <td class="whitespace-nowrap p-3 text-sm">
                                    {{ $transaction->value }}
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
                                        class="rounded-full border bg-{{ $transaction->status->color() }}-500 text-xs  px-4 py-2 inline-flex gap-2 items-center">
                                        <x-dynamic-component :component="'icons.' . $transaction->status->icon()" class="w-4 h-4" />
                                        <span>{{ $transaction->status->label() }}</span>
                                    </span>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center">
                                        @if ($transaction->status == 'paid' || $transaction->status == 'received')
                                            <x-icons.like-fill class="w-6 h-6 text-blue-500" />
                                        @else
                                            <x-icons.like class="w-6 h-6 text-blue-500" />
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="whitespace-nowrap p-3 text-sm text-center">
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
    </div>
</div>
