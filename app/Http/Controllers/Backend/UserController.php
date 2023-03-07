<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//    public function __construct() {
//        $this->middleware('can:User.Index');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('created_at', 'DESC')->get();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only('name', 'email', 'password', 'role_id');

        $rules = [
            'name' => 'required|min:6|max:50|unique:users',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|in:1,2'
        ];
        $request->validate($rules);

        $inputs['password'] = Hash::make($request->password);
        User::create($inputs);

        $notification = array(
            'message' => 'Tài khoản đã được tạo thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/user')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editUser'] = User::findOrFail($id);

        return view('backend.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->only('name', 'email', 'password', 'role_id');

        $rules = [
            'name' => 'required|min:6|max:50|unique:users,name,' . $id,
            'email' => 'required|unique:users,email,' . $id,
            'role_id' => 'required|in:1,2',
        ];

        if ($request->password) {
            $rules['password'] = 'required|min:8';
        }
        $request->validate($rules);

        if (!empty($inputs['password'])) {
            $inputs['password'] = Hash::make($request->password);
        } else {
            unset($inputs['password']);
        }
        $user = User::findOrFail($id);
        $user->fill($inputs);
        $user->save();

        $notification = array(
            'message' => 'Cập nhật tài khoản thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/user')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'xóa tài khoản thành công ...!',
            'alert-type' => 'success'
        );
        return redirect('admin/user')->with($notification);
    }
}
