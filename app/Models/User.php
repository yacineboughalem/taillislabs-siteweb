<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Devinweb\LaravelYouCanPay\Traits\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getCustomerInfo(){

    return [
      'name'             => $this->name,
      'title'            => $this->title,
      'firstname'        => $this->firstname,
      'lastname'         => $this->lastname,
      'birthday'         => $this->birthday,
      'place_birthday'   => $this->place_birthday,
      'land'             => $this->land,
      'nationality'      => $this->nationality,
      'address'          => $this->address,
      'zip_code'         => $this->zip_code,
      'city'             => $this->city,
      'country'          => $this->country,
      'phone'            => $this->phone,
      'email'            => $this->email,
    ];
 
  }






}
