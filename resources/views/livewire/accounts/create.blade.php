<div class="p-4 flex items-center justify-center">
    <x-layouts.configurations>
        <div class="p-7 rounded-lg w-full h-fit flex flex-col gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">{{ __('Create New Account') }}</h1>
                <x-nav-link :href="route('accounts')" wire:navigate
                    class="px-4 py-2 bg-white rounded-lg border border-slate-200 text-gray-800 duration-200 inline-flex items-center gap-2">
                    <span>Return</span>
                </x-nav-link>
            </div>
            <form wire:submit="saveAccount()" lazy>
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <x-input-label>Name</x-input-label>
                        <input class="form-input w-full" wire:model.live="name" placeholder="Type name here ..." />
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label>Description</x-input-label>
                        <textarea class="form-input w-full h-24" placeholder="Type the description here ..."></textarea>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-lg  text-white duration-200 inline-flex items-center gap-2">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </x-layouts.configurations>
</div>
