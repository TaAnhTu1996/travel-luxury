<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\CustomerReview;
use App\Models\Library;
use App\Models\Region;
use App\Models\Schedule;
use App\Models\Setting;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Psy\Util\Json;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        $tours = Tour::paginate(6);
        $bookingFinish = Booking::where('status', BOOKING_FINISHED)->paginate(6)->sortByDesc("created_at");
        return view('frontend.index', compact('regions', 'tours', 'bookingFinish'));
    }

    public function search(Request $request)
    {
        $tours = Tour::all();
        if ($request->ajax()) {
            return $this->response([
                'data' => TourResource::collection($tours)
            ]);
        }
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function library()
    {
        $regions = Region::all();
        return view('frontend.library', compact('regions'));
    }

    public function customerReview()
    {
        $customerCheck = Auth::guard('customer')->check();
        $customer = Auth::guard('customer')->user();

        $reviews = CustomerReview::orderBy('created_at', 'DESC')->get();
        if (CustomerReview::count() > 0) {
            foreach ($reviews as $item) {
                $images[] = json_decode($item->image);
            }
        } else {
            $images = [];
        }
        return view('frontend.customer-review', compact('customer', 'customerCheck', 'reviews', 'images'));
    }

    public function blogReview($id)
    {
        $review = CustomerReview::findOrFail($id);
        $similarTours = Tour::where('region_id', $review->tour->region_id)->where('id', '!=', $review->tour->id)->paginate(3)->sortByDesc("created_at");
        $similarReviews = CustomerReview::where('id', '!=', $id)->where('tour_id', $review->tour_id)->get();

        if (CustomerReview::count() > 0) {
                $images = json_decode($review->image);
        } else {
            $images = [];
        }
        return view('frontend.blog-review', compact('review', 'similarTours', 'images', 'similarReviews'));
    }

    public function sessionBooking(Request $request)
    {
        $inputs = $request->only('name', 'email', 'phone_number', 'address', 'total_person', 'customer_id', 'tour_id', 'status');

        $rules = [
            'name' => 'required|min:6|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required|min:3|max:100',
            'total_person' => 'required|numeric',
            'customer_id' => 'required|numeric',
            'tour_id' => 'required|numeric'
        ];
        $request->validate($rules);
        $inputs['status'] = 0;

        $booking = $inputs;
        $request->session()->put('booking', $booking);

        if($request->ajax()){
            return response()->json([
                'success' => true,
                'data' => $booking
            ]);
        }
        return redirect()->back();
    }

    public function checkOut(Request $request)
    {
        if ($request->session()->get('booking')) {
            $data = $request->session()->get('booking');
            $bookingEndcode = json_encode($data);
            $booking = json_decode($bookingEndcode);
            $tour = Tour::where('id', $booking->tour_id)->first();
        } else {
            $booking = '';
            $tour = '';
        }

        return view('frontend.check-out', compact('booking', 'tour'));
    }

    public function tourDetail( Request $request, $id)
    {
        $customerCheck = Auth::guard('customer')->check();
        $customer = Auth::guard('customer')->user();

        $schedules = Schedule::where('tour_id', $id)->get();
        $tourDetail = Tour::findOrFail($id);
        $comments = Comment::where('tour_id', $id)->get()->sortByDesc('created_at');
        $library = Library::where('tour_id', $id)->first();
        $similarTours = Tour::where('region_id', $tourDetail->region_id)->where('id', '!=', $id)->paginate(3)->sortByDesc("created_at");
        $buyTour = Booking::where('tour_id', $id)->where('status', BOOKING_FINISHED)->count();

        if ($library) {
            $images = json_decode($library->file);
        } else {
            $images = "";
        }
        if($customer) {
            if($request->ajax()){
                return response()->json([
                    'success' => true,
                    'data' => $customer
                ]);
            }
        }
        return view('frontend.tour-detail', compact('tourDetail', 'images', 'similarTours', 'schedules', 'customerCheck', 'customer', 'comments', 'buyTour'));
    }

    public function tourList($id)
    {
        $regions = Region::all();
        $tours = Tour::where('region_id', $id)->get();
        $regionTitle = Region::where('id', $id)->pluck('name')->first();
        return view('frontend.tour-list', compact('regions', 'tours', 'regionTitle'));
    }

    public function customerReviewCreate(Request $request)
    {
        $inputs = $request->only('response', 'id');
        $validator = \Validator::make($inputs, [
            'response' => 'required|in:accept',
            'id' => 'required|exists:bookings,id'
        ]);
        if ($validator->fails()) {
            abort(404);
        }
        $booking = Booking::where('id', $inputs['id'])->first();
        return view('frontend.customer-review-create', compact('booking'));
    }
}
