<div class="p-4 lg:w-[60rem] w-full">
    <h1 class="text-2xl mb-7">Configurations</h1>
    <div class="flex justify-center w-full ">
        <div class="grid lg:grid-cols-3 gap-7 w-full">
            <div class="flex justify-center">
                <div class="list-none inline-flex w-full lg:flex lg:flex-col gap-2 border-b border-slate-200">
                    <x-nav-link class="w-full p-2 md:text-lg" :href="route('categories')" wire:navigate :active="request()->routeIs('configurations*', 'categories*')">
                        {{ __('routes.categories') }}
                    </x-nav-link>
                    <x-nav-link class="w-full p-2 md:text-lg" :href="route('accounts')" wire:navigate :active="request()->routeIs('configurations*', 'accounts*')">
                        {{ __('routes.accounts') }}
                    </x-nav-link>
                    <x-nav-link class="w-full p-2 md:text-lg" wire:navigate :href="route('credit-cards')" :active="request()->routeIs('configurations*', 'credit-cards*')">
                        {{ __('routes.credit_cards') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="lg:col-span-2 row-span-2 flex justify-start bg-white rounded-xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
