<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = 'image_library';
    protected $fillable = ['title', 'file', 'tour_id'];

    public function tour() {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
