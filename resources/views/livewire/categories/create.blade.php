<div class="p-4 flex items-center justify-center">
    <x-layouts.configurations>
        <div class="p-7 rounded-lg w-full h-fit flex flex-col gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">{{ __('Create New Category') }}</h1>
                <x-nav-link :href="route('categories')" wire:navigate
                    class="px-4 py-2 bg-white rounded-lg border border-slate-200 text-gray-800 duration-200 inline-flex items-center gap-2">
                    <span> {{ __('actions.return') }}</span>
                </x-nav-link>
            </div>
            <form wire:submit="saveCategory()">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <x-input-label>Name</x-input-label>
                        <input class="form-input w-full" wire:model.live="name" placeholder="Type name here ..." />
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Type</x-input-label>
                        <select wire:model.live="type" class="form-select w-full" placeholder="Choose a type">
                            <option value="incomes">Incomes</option>
                            <option value="expenses">Expenses</option>
                        </select>

                        @error('type')
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
