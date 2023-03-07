<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';
    protected $fillable = [
        'title',
        'introduce',
        'price',
        'schedule',
        'departure_from',
        'destination',
        'start',
        'image',
        'region_id',
    ];

    public function regions() {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function getLibrary() {
        return $this->belongsTo(Library::class, 'tour_id');
    }

    public function comment() {
        return $this->hasMany(Comment::class, 'tour_id');
    }

    public function schedule() {
        return $this->hasMany(Schedule::class, 'tour_id');
    }

    public function booking() {
        return $this->hasMany(Booking::class, 'tour_id');
    }

    public function review() {
        return $this->hasMany(CustomerReview::class, 'tour_id');
    }
}
