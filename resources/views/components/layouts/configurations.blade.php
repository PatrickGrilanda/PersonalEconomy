<div class="w-full lg:max-w-7xl">
    <h1 class="text-2xl mb-7">Configurations</h1>
    <div class="flex justify-center w-full ">
        <div class="grid w-full lg:grid-cols-3 gap-7">
            <div class="flex justify-center">
                <div class="inline-flex w-full gap-2 list-none border-b lg:flex lg:flex-col border-slate-200">
                    <x-nav-link class="w-full p-2 md:text-lg" :href="route('configurations.categories')" wire:navigate :active="request()->routeIs('configurations.categories*', 'configurations.categories.*')">
                        {{ __('routes.categories') }}
                    </x-nav-link>
                    <x-nav-link class="w-full p-2 md:text-lg" :href="route('configurations.accounts')" wire:navigate :active="request()->routeIs('configurations.accounts*', 'configurations.accounts.*')">
                        {{ __('routes.accounts') }}
                    </x-nav-link>
                    <x-nav-link class="w-full p-2 md:text-lg" wire:navigate :href="route('configurations.credit-cards')" :active="request()->routeIs('configurations.credit-cards*', 'configurations.credit-cards.*')">
                        {{ __('routes.credit_cards') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="flex justify-start row-span-2 bg-white lg:col-span-2 rounded-xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
