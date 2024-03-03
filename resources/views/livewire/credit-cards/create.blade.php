<div class="p-4 flex items-center justify-center">
    <x-layouts.configurations>
        <div class="p-7 rounded-lg w-full h-fit flex flex-col gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">
                    {{ __('actions.create_new') . ' ' . __('routes.credit_card') }}
                </h1>
                <x-nav-link :href="route('credit-cards')" wire:navigate
                    class="px-4 py-2 bg-white rounded-lg border border-slate-200 text-gray-800 duration-200 inline-flex items-center gap-2">
                    <span>{{ __('actions.return') }}</span>
                </x-nav-link>
            </div>
            <form wire:submit="saveCreditCard()">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <x-input-label>Name</x-input-label>
                        <input class="form-input w-full" wire:model.live="name"
                            placeholder="{{ __('actions.type') }} name here ..." />
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Limit</x-input-label>
                        <input type="number" step="0.01" placeholder="{{ __('actions.type') }} the limit here"
                            class="form-input w-full" wire:model="limit" />
                        @error('limit')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Invoice Closing Date</x-input-label>
                        <input type="number" placeholder="{{ __('actions.type') }} the closing date"
                            class="form-input w-full" wire:model="invoice_closing_date" />
                        @error('invoice_closing_date')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Invoice Due Date</x-input-label>
                        <input type="number" placeholder="{{ __('actions.type') }} the Due date date"
                            class="form-input w-full" wire:model="invoice_due_date" />
                        @error('invoice_due_date')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-lg  text-white duration-200 inline-flex items-center gap-2">
                        {{ __('actions.save') }}
                    </button>
                </div>
            </form>
        </div>
    </x-layouts.configurations>
</div>
