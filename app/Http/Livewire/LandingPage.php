<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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
        DB::transaction(function() {
            $subscriber = Subscriber::create([
                'email' => $this->email,
            ]);
            $notification = new VerifyEmail;
            $notification->createUrlUsing(function($notifiable){
                return URL::temporarySignedRoute(
                    'subscribers.verify',
                    now()->addMinutes(30),
                    [
                        'subscriber' => $notifiable->getKey()
                    ],
                );
            }); 
            $subscriber->notify($notification);

        }, $deadlockRestries = 5);
        

        $this->reset('email');
    }
}
