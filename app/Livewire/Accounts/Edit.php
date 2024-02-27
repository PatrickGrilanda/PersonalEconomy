<?php

namespace App\Livewire\Accounts;

use App\Models\Account;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Account')]
class Edit extends Component
{
    use LivewireAlert;

    public Account $account;

    #[Rule('string|required')]
    public String $name;

    #[Rule('string')]
    public String $description;

    public function mount(Account $account)
    {
        $this->account = $account;

        $this->name = $account->name;
        $this->description = $account->description;
    }

    public function updateAccount()
    {
        $this->validate();

        $this->account->name = $this->name;
        $this->account->description = $this->description;
        $this->account->save();

        $this->alert('success', 'Account updated sucessfully');
    }


    public function render()
    {
        return view('livewire.accounts.edit');
    }
}
