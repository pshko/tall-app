<?php

namespace App\Models;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, MustVerifyEmail, Notifiable;

    protected $fillable = [
        'email',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
