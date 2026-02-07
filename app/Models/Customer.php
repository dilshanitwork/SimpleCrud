<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer_registation';
    protected $fillable = ['name', 'email', 'password', 'gender', 'age', 'phone', 'address'];
}
