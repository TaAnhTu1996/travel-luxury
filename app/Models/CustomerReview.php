<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    protected $table = 'customer_reviews';
    protected $fillable = ['title', 'message', 'image', 'tour_id', 'customer_id'];

    public function tour() {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
