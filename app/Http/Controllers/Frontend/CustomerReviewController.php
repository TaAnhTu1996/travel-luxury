<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $inputs = $request->all();

        $rules = [
            'title' => 'required|min:6',
            'message' => 'required',
            'image' =>'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tour_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
        ];
        $request->validate($rules);
        if ($request->isMethod('post')){
            if ($request->hasFile('image')){
                foreach($request->file('image') as $image)
                {
                    $imageName = $image->getClientOriginalName();
                    $folder_image = 'img/customer-review/';
                    $image->move($folder_image, $imageName);
                    $data[] = $imageName;
                }
            }
        }

        $inputs['image'] = json_encode($data);
        CustomerReview::create($inputs);

        $notification = array(
            'message' => 'Đăng trải nghiệm thành công...!',
            'alert-type' => 'success'
        );
        return redirect('customer-review')->with($notification);
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
    public function edit(Request $request, $id)
    {
        if($request->ajax()){
            $reviewEdit = CustomerReview::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $reviewEdit
            ]);
        }
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
        $inputs = $request->only('title', 'message', 'image', 'tour_id', 'customer_id');

        $rules = [
            'title' => 'required|min:6',
            'message' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_new.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tour_id' => 'required|numeric',
            'customer_id' => 'required|numeric',
        ];
        $request->validate($rules);
        if ($request->isMethod('patch')){
            if ($request->hasFile('image_new')){
                foreach($request->file('image_new') as $image)
                {
                    $imageName = $image->getClientOriginalName();
                    $folder_image = 'img/customer-review/';
                    $image->move($folder_image, $imageName);
                    $data[] = $imageName;
                }
            }
        }

        $inputs['image'] = $request->file() == null ? CustomerReview::where('id', $id)->first()->image : json_encode($data);

        $review = CustomerReview::findOrFail($id);
        $review->fill($inputs);
        $review->save();

        $notification = array(
            'message' => 'Cập nhật bài viết thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerReview::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Xóa bài viết thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
