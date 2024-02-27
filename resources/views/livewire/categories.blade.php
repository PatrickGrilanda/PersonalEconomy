<div class="p-4 flex items-center justify-center">
    <x-layouts.configurations>
        <div class="p-7 rounded-lg w-full h-fit flex flex-col gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">{{ __('Categories') }}</h1>
                <x-nav-link :href="route('categories.create')" wire:navigate
                    class="px-4 py-1 bg-blue-500 rounded-lg hover:bg-blue-600 text-white border-none hover:text-white duration-200 inline-flex items-center gap-2">
                    <span class="w-5 h-5 flex items-center justify-center border border-white rounded-full">
                        <x-icons.plus class="w-3 h-3" />
                    </span>
                    <span>Create New</span>
                </x-nav-link>
            </div>
            @if ($categories->count() > 0)
                <div class="flex justify-center my-4">
                    <div class="p-2 bg-slate-200 rounded-full inline-flex gap-2">
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
                <ul class="list-none flex flex-col gap-2">
                    @foreach ($categories as $category)
                        <li wire:key="{{ $category->id }}"
                            class="p-2 w-full border rounded-lg border-gray-300 group hover:bg-slate-100 duration-200 cursor-pointer">
                            <a href="{{ route('accounts.show', ['account' => $category->id]) }}">
                                <div class="inline-flex items-center px-2 justify-between w-full">
                                    <div class="inline-flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-slate-200 text-gray-700 rounded-full flex justify-center items-center">
                                            <x-icons.wallet class="w-8 h-8" />
                                        </div>
                                        <span>{{ $category->name }}</span>
                                    </div>
                                    <span class="group-hover:block hidden">
                                        <x-icons.chevron-left class="h-6 w-6" />
                                    </span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 p-2 border border-slate-200 text-center rounded-lg">
                    {{ __('Nothin to see here until now...') }}</p>
            @endif
            <div class="my-2">
                {{ $categories->links('livewire.layout.pagination') }}
            </div>
        </div>
    </x-layouts.configurations>
</div>
