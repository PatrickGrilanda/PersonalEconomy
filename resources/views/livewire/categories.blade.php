<div>
    <x-slot name="header">
        {{ __('routes.categories') }}
    </x-slot>
    <div class="flex items-center justify-center p-4">
        <x-layouts.configurations>
            <div class="flex flex-col w-full gap-4 rounded-lg p-7 h-fit">
                <div class="flex justify-between">
                    <h1 class="text-xl font-bold">{{ __('routes.categories') }}</h1>
                    <x-nav-link :href="route('configurations.categories.create')" wire:navigate
                        class="inline-flex items-center gap-2 px-4 py-1 text-white duration-200 bg-blue-500 border-none rounded-lg hover:bg-blue-600 hover:text-white">
                        <span class="flex items-center justify-center w-5 h-5 border border-white rounded-full">
                            <x-icons.plus class="w-3 h-3" />
                        </span>
                        <span>
                            {{ __('actions.create_new') }}
                        </span>
                    </x-nav-link>
                </div>
                <div class="flex justify-center my-4">
                    <div class="inline-flex gap-2 p-2 rounded-full bg-slate-200">
                        <button @class([
                            'rounded-full  px-4 py-2 duration-200',
                            'bg-white text-gray-700 shadow-lg' => $type == 'incomes',
                        ]) wire:click="setType('incomes')">Incomes</button>
                        <button @class([
                            'rounded-full  px-4 py-2 duration-200',
                            'bg-white text-gray-700 shadow-lg' => $type == 'expenses',
                        ]) wire:click="setType('expenses')">Expenses</button>
                    </div>
                </div>
                @if ($categories->count() > 0)
                    <ul class="flex flex-col gap-2 list-none">
                        @foreach ($categories as $category)
                            <li wire:key="{{ $category->id }}"
                                class="w-full p-2 duration-200 border border-gray-300 rounded-lg cursor-pointer group hover:bg-slate-100">
                                <a href="{{ route('configurations.categories.show', ['category' => $category->id]) }}"
                                    wire:navigate>
                                    <div class="inline-flex items-center justify-between w-full px-2">
                                        <div class="inline-flex items-center gap-4">
                                            <div
                                                class="flex items-center justify-center w-12 h-12 text-gray-700 rounded-full bg-slate-200">
                                                <x-icons.wallet class="w-8 h-8" />
                                            </div>
                                            <span>{{ $category->name }}</span>
                                        </div>
                                        <span class="hidden group-hover:block">
                                            <x-icons.chevron-right class="w-6 h-6" />
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="p-2 text-center text-gray-500 border rounded-lg border-slate-200">
                        {{ __('Nothin to see here until now...') }}</p>
                @endif
                <div class="my-2">
                    {{ $categories->links('livewire.layout.pagination') }}
                </div>
            </div>
        </x-layouts.configurations>
    </div>
</div>
