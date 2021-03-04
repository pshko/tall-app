<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function verify(Subscriber $subscriber)
    {
    	if (! $subscriber->hasVerifiedEmail()) {
    		$subscriber->markEmailAsVerified();
    	}
    	return redirect('/?verified=1');
    }
}
