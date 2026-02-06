<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'user_registation';
    protected $fillable = ['name', 'email', 'password'];
}
