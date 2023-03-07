<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    protected $fillable = ['name', 'image'];

    public function getTour() {
        return $this->hasMany(Tour::class, 'region_id');
    }
}
