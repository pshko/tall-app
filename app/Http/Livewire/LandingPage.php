<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
class LandingPage extends Component
{
    public $email;
    protected $rules = [
        'email' => 'required|email:filter|unique:subscribers,email',
    ];
    public function render()
    {
        return view('livewire.landing-page');
    }
    public function subscribe() 
    {
        $this->validate();
        $subscribe = Subscriber::create([
            'email' => $this->email,
        ]); 
        $this->reset('email');
    }
}
