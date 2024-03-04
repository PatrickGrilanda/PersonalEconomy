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
                <div class="w-full p-4 bg-white shadow rounded-2xl">
                    <h1>{{ __('messages.credit_cards') }}</h1>
                    <select class="w-full form-input" wire:model.live="credit_card_id">
                        @foreach ($credit_cards as $credit_card)
                            <option wire:key="{{ $credit_card->id }}" value="{{ $credit_card->id }}">
                                {{ $credit_card->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
