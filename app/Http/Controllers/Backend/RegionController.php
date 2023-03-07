<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::orderBy('created_at', 'DESC')->get();
        return view('backend.region.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.region.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only('name', 'image');

        $rules = [
            'name' => 'required|min:6|max:50|unique:regions',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $request->validate($rules);

        if ($request->isMethod('post')) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $folder_image = 'img';
                $imageName = $file->getClientOriginalName();
                $file->move($folder_image, $imageName);
            }
        }

        $inputs['image'] = $request->image->getClientOriginalName();
        Region::create($inputs);

        $notification = array(
            'message' => 'Thêm vùng miền thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/region')->with($notification);
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
        $data['editRegion'] = Region::findOrFail($id);
        return view('backend.region.edit', $data);
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
        $inputs = $request->only('name', 'image');
        $rules = [
            'name' => 'required|min:6|unique:regions,name,' . $id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_new' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $request->validate($rules);

        if ($request->isMethod('patch')) {
            if ($request->hasFile('image_new')) {
                $file = $request->file('image_new');
                $folder_image = 'img';
                $imageName = $file->getClientOriginalName();
                $file->move($folder_image, $imageName);
            }
        }

        $inputs['image'] = $request->file() == null ? Region::where('id', $id)->first()->image : $request->image_new->getClientOriginalName();

        $region = Region::findOrFail($id);
        $region->fill($inputs);
        $region->save();

        $notification = array(
            'message' => 'Cập nhật vùng miền thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/region')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Region::findOrFail($id)->delete();
        $notification = array(
            'message' => 'xóa vùng miền thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/region')->with($notification);
    }
}
