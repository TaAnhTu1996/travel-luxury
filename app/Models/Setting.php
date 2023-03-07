<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = [
        'information',
        'email',
        'logo',
        'phone_number',
        'address'
    ];
}
