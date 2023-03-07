<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\MailCustomerUpdate;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->get();
        return view('backend.customer.index', compact('customers'));
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
        //
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
        $editCustomer = Customer::findOrFail($id);
        return view('backend.customer.edit', compact('editCustomer'));
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
        $inputs = $request->only('name', 'password', 'email', 'phone_number', 'address');

        $rules = [
            'name' => 'required|min:6|max:50|unique:customers,name,' . $id,
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required|min:3|max:100'
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

        $request->validate($rules);

        $customer = Customer::findOrFail($id);
        $customer->fill($inputs);
        $customer->save();

        if ($request->password) {
            $password = $request->password;
        } else {
            $password = 'Mật khẩu cũ của bạn';
        }

        if ($customer) {
            \Mail::to($customer->email)->send(new MailCustomerUpdate($customer, $password));
        }

        $notification = array(
            'message' => 'Cập nhật tài khoản thành công...!',
            'alert-type' => 'success'
        );
        return redirect('admin/customer')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Xóa tài khoản thành công...!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
