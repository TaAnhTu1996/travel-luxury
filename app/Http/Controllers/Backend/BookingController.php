<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\MailBookingFinish;
use App\Mail\MailBookingSuccess;
use App\Mail\MailCheckoutAdmin;
use App\Mail\MailInformationCheckout;
use App\Mail\MailUpdateBookingToAdmin;
use App\Mail\MailUpdateBookingToCustomer;
use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->get();

        $statistical = Booking::where('status', BOOKING_FINISHED)->get();
        $amount = 0;

        if ($statistical->count() > 0 ) {
            foreach ($statistical as $booking) {
                $amount += $booking->total_price;
            }
        }
        //dd($amount);
        return view('backend.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only('name', 'email', 'phone_number', 'address', 'total_person', 'total_price', 'customer_id', 'tour_id', 'status');

        $rules = [
            'name' => 'required|min:6|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required|min:3|max:100',
            'total_person' => 'required|numeric',
            'total_price' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'tour_id' => 'required|numeric'
        ];
        $request->validate($rules);
        $inputs['status'] = BOOKING_PENDING;

        $booking = Booking::create($inputs);
        $tour = Tour::where('id', $booking->tour_id)->first();
        if ($booking) {
            \Mail::to($booking->email)->send(new MailInformationCheckout($booking->name, $booking, $tour));
            \Mail::to('luxurytravelvn21@gmail.com')->send(new MailCheckoutAdmin($booking));
        }
        $request->session()->forget('booking');

        $notification = array(
            'message' => 'Đặt tour thành công...!',
            'alert-type' => 'success'
        );
        return redirect('customer/history')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tours = Tour::all();
        $editBooking = Booking::findOrFail($id);
        return view('backend.booking.edit', compact('editBooking', 'tours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only('name', 'email', 'phone_number', 'address', 'total_person', 'total_price', 'customer_id', 'status');

        $rules = [
            'name' => 'required|min:6|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required|min:3|max:100',
            'total_person' => 'required|numeric',
            'total_price' => 'required|numeric'
        ];
        $request->validate($rules);

        $booking = Booking::findOrFail($id);
        $inputs['status'] = $booking->status;
        $inputs['customer_id'] = $booking->customer_id;
        $booking->fill($inputs);
        $booking->save();

        $tour = $booking->tour;
        if ($booking) {
            \Mail::to($booking->email)->send(new MailUpdateBookingToCustomer($booking->name, $booking, $tour));
            \Mail::to('luxurytravelvn21@gmail.com')->send(new MailUpdateBookingToAdmin($booking));
        }

        $notification = array(
            'message' => 'Cập nhật tour thành công...!',
            'alert-type' => 'success'
        );
        return redirect('admin/booking')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Xóa tour thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function mailTourFinish($id)
    {
        $bookingFinish = Booking::findOrFail($id);
        $bookingFinish->status = BOOKING_FINISHED;
        $bookingFinish->save();

        $link = route('frontend.customer-review-create')."?id=$bookingFinish->id";
        if ($bookingFinish) {
            \Mail::to($bookingFinish->email)->send(new MailBookingFinish($bookingFinish, $link));
        }

        $notification = array(
            'message' => 'Gửi mail kết thúc Tour thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function mailTourSuccess($id)
    {
        $bookingSuccess = Booking::findOrFail($id);
        $bookingSuccess->status = BOOKING_ACCEPTED;
        $bookingSuccess->save();

        if ($bookingSuccess) {
            \Mail::to($bookingSuccess->email)->send(new MailBookingSuccess($bookingSuccess->name, $bookingSuccess->tour));
        }

        $notification = array(
            'message' => 'Gửi mail đặt Tour thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
