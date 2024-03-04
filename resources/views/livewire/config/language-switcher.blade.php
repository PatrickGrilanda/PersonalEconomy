<div>
    <ul>
        <li>
            <x-dropdown-link wire:click="switch('en')" class="cursor-pointer inline-flex gap-2 items-center">
                <x-icons.usa-flag class="w-6 h-6" />
                <span>English</span>
                @if (app()->getLocale() == 'en')
                    <x-icons.check-badge class="w-5 h-5 text-blue-500" />
                @endif
            </x-dropdown-link>
        </li>
        <li>
            <x-dropdown-link wire:click="switch('pt-br')" class="cursor-pointer inline-flex gap-2">
                <x-icons.brazil-flag class="w-6 h-6" />
                <span>Português do Brasil</span>
                @if (app()->getLocale() == 'pt-br')
                    <x-icons.check-badge class="w-5 h-5 text-blue-500" />
                @endif
            </x-dropdown-link>
        </li>
    </ul>
</div>
