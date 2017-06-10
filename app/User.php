<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'stripe_customer_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin() {
      return $this->admin;
    }

    public function addresses() {
      return $this->hasMany('App\Address');
    }

    public function details() {
      return $this->hasMany('App\AccountDetails');
    }

    public function cards() {
      return $this->hasMany('App\Card');
    }

    public function orders() {
      return $this->hasMany('App\Order');
    }

    public function messages() {
      return $this->hasMany('App\Message');
    }

    public function reviews() {
      return $this->hasMany('App\Review');
    }

    public function invoices() {
      return $this->hasMany('App\Invoice');
    }
}
