<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['title', 'content', 'tour_id'];

    public function getTour() {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
