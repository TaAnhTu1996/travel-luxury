<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::orderBy('created_at', 'DESC')->get();
        return view('backend.tour.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('backend.tour.add', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only(
            'title',
            'introduce',
            'price',
            'schedule',
            'departure_from',
            'destination',
            'start',
            'image',
            'region_id'
        );

        $rules = [
            'title' => 'required|min:10|max:300|unique:tours',
            'introduce' => 'required',
            'price' => 'required|numeric',
            'schedule' => 'required',
            'departure_from' => 'required',
            'destination' => 'required',
            'start' => 'required',
            'image' =>'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'region_id' => 'required'
        ];
        $request->validate($rules);

        if ($request->isMethod('post')){
            if ($request->hasFile('image')){
                $file = $request->file('image');
                $folder_image = 'img/tours/';
                $imageName = $file->getClientOriginalName();
                $file->move($folder_image, $imageName);
            }
        }

        $inputs['image'] = $request->image->getClientOriginalName();
        Tour::create($inputs);

        $notification = array(
            'message' => 'Thêm tour thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/tour')->with($notification);
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
        $data['editTour'] = Tour::findOrFail($id);
        $data['regions'] = Region::all();
        return view('backend.tour.edit', $data);
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
        $inputs = $request->only(
            'title',
            'introduce',
            'price',
            'schedule',
            'departure_from',
            'destination',
            'start',
            'image',
            'region_id'
        );

        $rules = [
            'title' => 'required|min:10|max:300|unique:tours,title,' . $id,
            'introduce' => 'required',
            'price' => 'required|numeric',
            'schedule' => 'required',
            'departure_from' => 'required',
            'destination' => 'required',
            'start' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_new' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'region_id' => 'required'
        ];
        $request->validate($rules);

        if ($request->isMethod('patch')){
            if ($request->hasFile('image_new')){
                $file = $request->file('image_new');
                $folder_image = 'img/tours/';
                $imageName = $file->getClientOriginalName();
                $file->move($folder_image, $imageName);
            }
        }

        $inputs['image'] = $request->file() == null ? Tour::where('id', $id)->first()->image : $request->image_new->getClientOriginalName();

        $tour = Tour::findOrFail($id);
        $tour->fill($inputs);
        $tour->save();

        $notification = array(
            'message' => 'Cập nhật tour thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/tour')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tour::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Xóa tour thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/tour')->with($notification);
    }
}
