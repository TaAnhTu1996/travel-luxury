<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $settings = Setting::orderBy('created_at', 'DESC')->get();
        return view('backend.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('backend.setting.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $inputs = $request->only('information', 'email', 'logo', 'phone_number', 'address');

        $rules = [
            'information' => 'required|min:10|max:300',
            'email' => 'required|email',
            'logo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required|min:3|max:100'
        ];
        $request->validate($rules);

        if ($request->isMethod('post')) {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $folder_logo = 'img';
                $logoName = $file->getClientOriginalName();
                $file->move($folder_logo, $logoName);
            }
        }

        $inputs['logo'] = $request->logo->getClientOriginalName();
        Setting::create($inputs);

        $notification = array(
            'message' => 'Thêm cấu hình thành công...!',
            'alert-type' => 'success'
        );
        return redirect('admin/setting')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id

     */
    public function edit($id)
    {

        $data['editSetting'] = Setting::findOrFail($id);
        return view('backend.setting.edit', $data);
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only('information', 'email', 'logo', 'phone_number', 'address');
        $rules = [
            'information' => 'required|min:10|max:300',
            'email' => 'required|email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'logo_new' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required|min:3|max:100'
        ];
        $request->validate($rules);

        if ($request->isMethod('patch')) {
            if ($request->hasFile('logo_new')) {
                $file = $request->file('logo_new');
                $folder_logo = 'img';
                $logoName = $file->getClientOriginalName();
                $file->move($folder_logo, $logoName);
            }
        }

        $inputs['logo'] = $request->file() == null ? Setting::where('id', $id)->first()->logo : $request->logo_new->getClientOriginalName();

        $setting = Setting::findOrFail($id);
        $setting->fill($inputs);
        $setting->save();

        $notification = array(
            'message' => 'Cập nhật cấu hình thành công...!',
            'alert-type' => 'success'
        );
        return redirect('admin/setting')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Xóa cấu hình thành công...!',
            'alert-type' => 'success'
        );
        return redirect('admin/setting')->with($notification);
    }
}
