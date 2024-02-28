<div class="p-4 flex items-center justify-center">
    <x-layouts.configurations>
        <div class="p-7 rounded-lg w-full h-fit flex flex-col gap-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-bold">{{ __('Accounts') }}</h1>
                <x-nav-link :href="route('accounts.create')" wire:navigate
                    class="px-4 py-1 bg-blue-500 rounded-lg hover:bg-blue-600 text-white border-none hover:text-white duration-200 inline-flex items-center gap-2">
                    <span class="w-5 h-5 flex items-center justify-center border border-white rounded-full">
                        <x-icons.plus class="w-3 h-3" />
                    </span>
                    <span>Create New</span>
                </x-nav-link>
            </div>
            @if ($accounts->count() > 0)
                <ul class="list-none flex flex-col gap-2">
                    @foreach ($accounts as $account)
                        <li wire:key="{{ $account->id }}"
                            class="p-2 w-full border rounded-lg border-gray-300 group hover:bg-slate-100 duration-200 cursor-pointer">
                            <a href="{{ route('accounts.show', ['account' => $account->id]) }}">
                                <div class="inline-flex items-center px-2 justify-between w-full">
                                    <div class="inline-flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-slate-200 text-gray-700 rounded-full flex justify-center items-center">
                                            <x-icons.wallet class="w-8 h-8" />
                                        </div>
                                        <span>{{ $account->name }}</span>
                                    </div>
                                    <span class="group-hover:block hidden">
                                        <x-icons.chevron-right class="h-6 w-6" />
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
                {{ $accounts->links() }}
            </div>
        </div>
    </x-layouts.configurations>
</div>
