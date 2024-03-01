<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2 bg-white w-full rounded-2xl shadow p-4">
                Teste
            </div>
            <div class="grid grid-cols-3 gap-4 w-full col-span-2">
                <x-utilities.card :title="'Saldo acumulado do mês'" :titleSize="'lg'">
                    <div class="flex items-end justify-end">
                        <h1 class="text-3xl font-bold text-green-500">
                            $2,345.89
                        </h1>
                    </div>
                    <x-slot name="footer">
                        <button class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200">
                            Visualizar
                        </button>
                    </x-slot>
                </x-utilities.card>
                <x-utilities.card :title="'Saldo Mês Anterior'" :titleSize="'lg'">
                    <div class="flex items-end justify-end">
                        <h1 class="text-3xl font-bold text-red-500">
                            $-1,213.00
                        </h1>
                    </div>
                    <x-slot name="footer">
                        <button class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200">
                            Visualizar
                        </button>
                    </x-slot>
                </x-utilities.card>
                <x-utilities.card :title="'Receita do Mês'" :titleSize="'lg'">
                    <div class="flex items-end justify-end">
                        <h1 class="text-3xl font-bold text-green-500">
                            $15,233.00
                        </h1>
                    </div>
                    <x-slot name="footer">
                        <button class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200">
                            Visualizar
                        </button>
                    </x-slot>
                </x-utilities.card>
                <x-utilities.card :title="'Despesas do Mês'" :titleSize="'lg'">
                    <div class="flex items-end justify-end">
                        <div class="flex items-end justify-end">
                            <h1 class="text-3xl font-bold text-red-500">
                                $-12,233.00
                            </h1>
                        </div>
                    </div>
                    <x-slot name="footer">
                        <button class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200">
                            Visualizar
                        </button>
                    </x-slot>
                </x-utilities.card>
                <x-utilities.card :title="'Saldo Mês Atual'" :titleSize="'lg'">
                    <div class="flex items-end justify-end">
                        <h1 class="text-3xl font-bold text-green-500">
                            $3,354.00
                        </h1>
                    </div>
                    <x-slot name="footer">
                        <button class="w-full rounded-lg bg-gray-100 p-2 hover:bg-gray-300 duration-200">
                            Visualizar
                        </button>
                    </x-slot>
                </x-utilities.card>
            </div>
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
