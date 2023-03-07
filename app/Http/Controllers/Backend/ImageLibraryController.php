<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Models\Tour;
use Illuminate\Http\Request;

class ImageLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $library = Library::orderBy('created_at', 'DESC')->get();
        if (Library::count() > 0) {
            foreach ($library as $item) {
                $images[] = json_decode($item->file);
            }
        } else {
            $images = [];
        }

        return view('backend.image-library.index', compact('library', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tours = Tour::all();
        return view('backend.image-library.add', compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only('title', 'file', 'tour_id');

        $rules = [
            'title' => 'required|min:10|max:300',
            'file' =>'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tour_id' => 'required'
        ];
        $request->validate($rules);

        if ($request->isMethod('post')){
            if ($request->hasFile('file')){
                foreach($request->file('file') as $image)
                {
                    $imageName = $image->getClientOriginalName();
                    $folder_image = 'img/region/';
                    $image->move($folder_image, $imageName);
                    $data[] = $imageName;
                }
            }
        }

        $inputs['file'] = json_encode($data);
        Library::create($inputs);

        $notification = array(
            'message' => 'Thêm danh sách ảnh thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/image-library')->with($notification);
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
        $editLibrary = Library::findOrFail($id);
        $images = json_decode($editLibrary->file);

        return view('backend.image-library.edit', compact('editLibrary', 'images', 'tours'));
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
        $inputs = $request->only('title', 'file', 'tour_id');

        $rules = [
            'title' => 'required|min:10|max:300',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_new.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tour_id' => 'required'
        ];
        $request->validate($rules);

        if ($request->isMethod('patch')){
            if ($request->hasFile('file_new')){
                foreach($request->file('file_new') as $image)
                {
                    $imageName = $image->getClientOriginalName();
                    $folder_image = 'img/region/';
                    $image->move($folder_image, $imageName);
                    $data[] = $imageName;
                }
            }
        }
        $inputs['file'] = $request->file() == null ? Library::where('id', $id)->first()->file : json_encode($data);

        $region = Library::findOrFail($id);
        $region->fill($inputs);
        $region->save();

        $notification = array(
            'message' => 'Cập nhật danh sách ảnh thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/image-library')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Library::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Xóa danh sách ảnh thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/image-library')->with($notification);
    }
}
