<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    //
    public function showHistory()
    {
        $customerCheck = Auth::guard('customer')->check();
        $customer = Auth::guard('customer')->user();

        if ($customerCheck) {
            $booked = Booking::where('customer_id', $customer->id)->get()->sortByDesc("created_at");
            return view('auth.customer.history', compact('booked', 'customerCheck'));
        }
        return view('auth.customer.history', compact('customerCheck'));
    }
}
