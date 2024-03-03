@php

    function formatCurrency($value)
    {
        $locale = app()->getLocale();

        $currencyCodes = [
            'en' => 'USD', // Idioma inglês para dólar americano
            'pt-br' => 'BRL', // Idioma português (Brasil) para real brasileiro
            // Adicione mais mapeamentos conforme necessário
        ];

        $currencyCode = $currencyCodes[$locale] ?? 'USD';

        $formatter = new \NumberFormatter($locale . '@currency=' . $currencyCode, \NumberFormatter::CURRENCY);

        return $formatter->formatCurrency($value, $currencyCode);
    }

@endphp
<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2 bg-white w-full rounded-2xl shadow p-4">
                Teste {{ Route::currentRouteName() }}
            </div>
            @livewire('dashboard.analytics')
            <div class="col-span-2 flex gap-2">
                <div class="bg-white w-full rounded-2xl shadow p-4">
                    <h1>Suas contas</h1>
                </div>
                <div class="bg-white w-full rounded-2xl shadow p-4">
                    <h1>Seus Cartões de Crédito</h1>
                </div>
            </div>
        </div>
    </div>
</div>
