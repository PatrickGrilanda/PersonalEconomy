<div class="flex justify-center w-full mb-7">
    <div class="rounded-lg w-3/4 bg-slate-100 shadow-sm">
        <h1 class="text-center font-semibold uppercase text-xl">Create new Transaction</h1>
        <hr>
        <form wire:submit="saveTransaction()">
            <div class="">
                <label>Description</label>
                <input wire:model.live="description" />
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label>Category</label>
                <select wire:model.live="category_id">
                    <option selected value="">Select one</option>
                    @foreach ($categories as $category)
                        <option wire:key="{{ $category->id }}" value="{{ $category->id }}">
                            {{ $category->name }} | {{ $category->type }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label>Account</label>
                <select wire:model.live="account_id">
                    <option selected value="">Select one</option>
                    @foreach ($accounts as $account)
                        <option wire:key="{{ $account->id }}" value="{{ $account->id }}">
                            {{ $account->name }}</option>
                    @endforeach
                </select>
                @error('account_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label>Credit card ID</label>
                <select wire:model.live="credit_card_id">
                    <option selected value="">Select one</option>
                    @foreach ($credit_cards as $credit_card)
                        <option wire:key="{{ $credit_card->id }}" value="{{ $credit_card->id }}">
                            {{ $credit_card->name }}
                        </option>
                    @endforeach
                </select>
                @error('credit_card_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label>Date</label>
                <input wire:model.live="date" type="date" />
                @error('date')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label>Total Installments</label>
                <input wire:model.live="total_installments" />
                @error('total_installments')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label>Total Amount</label>
                <input wire:model.live="total_amount" />
                @error('total_amount')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label>Period Type</label>
                <select wire:model.live="period_type">
                    <option selected value="">Select one</option>
                    <option value="unique">Unico</option>
                    <option value="fixed">Fixo</option>
                    <option value="repetition">Parcelado</option>
                </select>
                @error('period_type')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Salvar</button>
        </form>
    </div>
</div>
