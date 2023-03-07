<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Region;
use App\Models\Tour;
use App\Models\TourType;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::count(),
            'regions' => Region::count(),
            'tours' => Tour::count(),
            'bookings' => Booking::count(),
            'totalCustomer' => Customer::orderBy('created_at', 'DESC')->get()
        ];
        return view('backend.index', $data);
    }
}
