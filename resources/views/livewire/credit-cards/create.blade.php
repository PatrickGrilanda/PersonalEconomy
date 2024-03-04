<div class="flex items-center justify-center p-4">
    <x-layouts.configurations>
        <div class="flex flex-col w-full gap-4 rounded-lg p-7 h-fit">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">
                    {{ __('actions.create_new') . ' ' . __('routes.credit_card') }}
                </h1>
                <x-nav-link :href="route('configurations.credit-cards')" wire:navigate
                    class="inline-flex items-center gap-2 px-4 py-2 text-gray-800 duration-200 bg-white border rounded-lg border-slate-200">
                    <span>{{ __('actions.return') }}</span>
                </x-nav-link>
            </div>
            <form wire:submit="saveCreditCard()">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <x-input-label>Name</x-input-label>
                        <x-text-input class="w-full" wire:model.live="name"
                            placeholder="{{ __('actions.type') }} name here ..." />
                        @error('name')
                            <x-input-error :messages="$errors->all()" />
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Limit</x-input-label>
                        <x-text-input class="w-full" type="number" step="0.01"
                            placeholder="{{ __('actions.type') }} the limit here" wire:model="limit" />
                        @error('limit')
                            <x-input-error :messages="$errors->all()" />
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Invoice Closing Date</x-input-label>
                        <x-text-input class="w-full" type="number"
                            placeholder="{{ __('actions.type') }} the closing date" wire:model="invoice_closing_date" />
                        @error('invoice_closing_date')
                            <x-input-error :messages="$errors->all()" />
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Invoice Due Date</x-input-label>
                        <x-text-input class="w-full" type="number"
                            placeholder="{{ __('actions.type') }} the Due date date" wire:model="invoice_due_date" />
                        @error('invoice_due_date')
                            <x-input-error :messages="$errors->all()" />
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Icon</x-input-label>
                        <x-text-input class="w-full" type="file" wire:model="icon" />
                        @error('icon')
                            <x-input-error :messages="$errors->all()" />
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Cover image</x-input-label>
                        <x-text-input class="w-full" type="file" wire:model="cover_image" />
                        @error('cover_image')
                            <x-input-error :messages="$errors->all()" />
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 text-white duration-200 bg-blue-500 rounded-lg hover:bg-blue-600">
                        {{ __('actions.save') }}
                    </button>
                </div>
            </form>
        </div>
    </x-layouts.configurations>
</div>
