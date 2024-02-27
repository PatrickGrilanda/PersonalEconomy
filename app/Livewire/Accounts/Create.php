<?php

namespace App\Livewire\Accounts;

use App\Models\Account;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Account')]
class Create extends Component
{
    use LivewireAlert;

    #[Rule('required|string:255')]
    public $name = '';

    #[Rule('string')]
    public $description = '';

    public function saveAccount()
    {
        $this->validate();

        $attributes = [
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->user()->id
        ];

        Account::create($attributes);

        $this->reset();
        $this->alert('success', 'Account created sucessfully');
    }

    public function render()
    {
        return view('livewire.accounts.create');
    }
}
