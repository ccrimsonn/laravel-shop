<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $table = 'customers';
    protected $fillable = ['email', 'password', 'firstName', 'surname', 'dob', 'gender'];
    protected $hidden = ['password', 'remember_token'];
}
