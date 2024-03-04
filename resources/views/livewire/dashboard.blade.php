<div>
    <x-slot name="header">
        {{ __('routes.dashboard') }}
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4">
            @livewire('dashboard.analytics')
            <div class="flex col-span-2 gap-2">
                <div class="w-full p-4 bg-white shadow rounded-2xl">
                    <h1>{{ __('messages.your_accounts') }}</h1>
                </div>
                <div class="p-4 bg-white shadow rounded-2xl">
                    <h1 class="font-semibold">{{ __('messages.credit_cards') }}</h1>
                    <div class="box-content my-4 w-96">
                        @livewire('credit-cards.swipper')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
