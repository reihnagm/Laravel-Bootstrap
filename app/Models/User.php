<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;

  protected $guarded = ['id'];

  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function village() {
    return $this->belongsTo('App\Models\Village');
  }

  public function educations() {
    return $this->hasMany('App\Models\Education');
  }

  public function works() {
    return $this->hasMany('App\Models\Work');
  }
}
