<div>
    <x-slot name="header">
        {{ __('routes.transactions') }}
    </x-slot>
    <div class="grid justify-center">
        <x-utilities.card class="w-auto">
            <livewire:transactions.chart lazy :chartType="'line'" :options="[
                'responsive' => true,
                'indexAxis' => 'x',
                'plugins' => [
                    'legend' => [
                        'position' => 'top',
                    ],
                    'title' => [
                        'display' => true,
                        'text' => __('routes.transactions'),
                    ],
                    'colors' => [
                        'enabled' => true,
                    ],
                ],
            ]" />
        </x-utilities.card>
        <div class="flex justify-center w-full h-full">
            <div class="lg:w-[75rem] rounded-2xl shadow my-4 p-4 bg-white overflow-auto">
                <livewire:transactions.table lazy />
            </div>
        </div>
    </div>
</div>
