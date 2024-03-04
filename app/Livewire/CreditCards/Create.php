<?php

namespace App\Livewire\CreditCards;

use App\Models\CreditCard;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Create Credit Card')]
class Create extends Component
{
    use LivewireAlert, WithFileUploads;

    #[Rule('string|required')]
    public String $name;

    #[Rule('required')]
    public float $limit;

    #[Rule('integer|required')]
    public int $invoice_closing_date;

    #[Rule('integer|required')]
    public int $invoice_due_date;

    #[Rule('image|max:5120|nullable')]
    public $icon;

    #[Rule('image|max:5120|nullable')]
    public $cover_image;

    public function saveCreditCard()
    {
        $this->validate();

        if ($this->icon) {
            $iconPath = $this->icon->store('icons', 'public');
        }

        if ($this->cover_image) {
            $coverImagePath = $this->cover_image->store('cover_images', 'public');
        }

        $attributes = [
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'limit' => $this->limit,
            'invoice_closing_date' => $this->invoice_closing_date,
            'invoice_due_date' => $this->invoice_due_date,
            'icon' => $iconPath ?? null,
            'cover_image' => $coverImagePath ?? null,
        ];

        CreditCard::create($attributes);

        $this->reset();
        $this->alert('success', 'Credit card created successfully');
    }

    public function render()
    {
        return view('livewire.credit-cards.create');
    }
}
