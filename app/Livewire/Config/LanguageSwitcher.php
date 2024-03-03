<?php

namespace App\Livewire\Config;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LanguageSwitcher extends Component
{
    public function switch($language)
    {
        Session::put('locale', $language);
        App::setLocale($language);
        //$this->emit('localeChanged'); // Opcional: Se você quiser reagir a esta mudança em outros componentes Livewire.
        $this->redirect('/dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.config.language-switcher');
    }
}
