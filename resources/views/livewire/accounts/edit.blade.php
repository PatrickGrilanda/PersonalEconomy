<div class="p-4 flex items-center justify-center">
    <x-layouts.configurations>
        <div class="p-7 rounded-lg w-full h-fit flex flex-col gap-4">
            <div class="flex justify-between items-center">
                <div class="inline-flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-200 text-gray-700 rounded-full flex justify-center items-center">
                        <x-icons.wallet class="w-8 h-8" />
                    </div>
                    <span>{{ $account->name }}</span>
                </div>
                <x-nav-link :href="route('accounts')" wire:navigate
                    class="px-4 py-2 bg-white rounded-lg border border-slate-200 text-gray-800 duration-200 inline-flex items-center gap-2">
                    <span>Return</span>
                </x-nav-link>
            </div>
            <form wire:submit="updateAccount()" lazy>
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <x-input-label>Name</x-input-label>
                        <input class="form-input w-full" wire:model.live="name" placeholder="Type name here ..."
                            wire:model.live="name" />
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Description</x-input-label>
                        <textarea class="form-input w-full h-24" wire:model.live="description" placeholder="Type the description here ..."
                            wire:model.live="description"></textarea>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-lg  text-white duration-200 inline-flex items-center gap-2">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </x-layouts.configurations>
</div>
