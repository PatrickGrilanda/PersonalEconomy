<?php

namespace App\Livewire\Accounts;

use App\Models\Account;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Show account')]
class Show extends Component
{
    public $account;

    public function mount(Account $account)
    {
        $this->account = $account;
    }

    public function delete()
    {
        $this->account->delete();
        $this->redirect('/configurations/accounts', navigate: true);
    }

    public function render()
    {
        return view('livewire.accounts.show');
    }
}
