<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Customer extends Authenticatable implements MustVerifyEmail
{
    protected $table = 'customers';
    protected $fillable = ['name', 'google_id', 'email', 'phone_number', 'password', 'address'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customerReview() {
        return $this->hasMany(CustomerReview::class, 'tour_id');
    }

    public function comment() {
        return $this->hasMany(Comment::class, 'customer_id');
    }

    public function booking() {
        return $this->hasMany(Booking::class, 'customer_id');
    }
}
