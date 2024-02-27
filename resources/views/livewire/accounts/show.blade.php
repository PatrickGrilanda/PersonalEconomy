<div class="p-4 flex items-center justify-center">
    <x-layouts.configurations>
        <div class="p-7 rounded-lg w-full h-fit flex flex-col gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">{{ __('Show Account') }}</h1>
                <x-nav-link :href="route('accounts')" wire:navigate
                    class="px-4 py-2 bg-white rounded-lg border border-slate-200 text-gray-800 duration-200 inline-flex items-center gap-2">
                    <span>Return</span>
                </x-nav-link>
            </div>
            <div>
                {{ $account->name }}
            </div>
        </div>
    </x-layouts.configurations>
</div>
