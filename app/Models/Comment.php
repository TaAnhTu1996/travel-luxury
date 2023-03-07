<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['name', 'email', 'content', 'customer_id', 'tour_id'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function tour() {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
