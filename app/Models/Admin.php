<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
