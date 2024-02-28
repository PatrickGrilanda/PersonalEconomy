<div class="p-4 flex items-center justify-center">
    <x-layouts.configurations>
        <div class="p-7 rounded-lg w-full h-fit flex flex-col gap-4">
            <div class="flex justify-between">
                <div wire:key="{{ $category->id }}"
                    class="p-2 rounded-lg  group hover:bg-slate-100 duration-200 cursor-pointer">
                    <div class="inline-flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-200 text-gray-700 rounded-full flex justify-center items-center">
                            <x-icons.wallet class="w-8 h-8" />
                        </div>
                        <span>{{ $category->name }}</span>
                    </div>
                </div>
                <div class="inline-flex gap-2 items-center">
                    <x-nav-link wire:navigate
                        class="px-4 py-2 bg-slate-200 hover:bg-gray-700 hover:text-white rounded-lg border-none text-gray-800 duration-200 inline-flex items-center gap-2">
                        <span>Edit</span>
                    </x-nav-link>
                    <x-nav-link wire:navigate wire:click="delete()"
                        class="px-4 py-2 bg-red-500 rounded-lg border-none text-white hover:text-white hover:bg-red-600 duration-200 inline-flex items-center gap-2 cursor-pointer">
                        <span>Delete</span>
                    </x-nav-link>
                    <x-nav-link :href="route('categories')" wire:navigate
                        class="px-4 py-2 rounded-lg border-none text-gray-800 hover:bg-slate-200 bg-slate-100 duration-200 inline-flex items-center gap-2">
                        <span>Return</span>
                    </x-nav-link>
                </div>
            </div>
            <div>
            </div>
        </div>
    </x-layouts.configurations>
</div>
