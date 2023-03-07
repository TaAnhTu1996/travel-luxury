<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['id', 'name', 'email', 'phone_number', 'address', 'total_person', 'total_price', 'customer_id', 'tour_id', 'status'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function tour() {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
