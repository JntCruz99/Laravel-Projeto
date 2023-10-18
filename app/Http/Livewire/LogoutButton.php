<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutButton extends Component
{
    public function render()
    {
        return view('livewire.logout-button');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
