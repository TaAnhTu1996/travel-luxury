<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Mail\MailCustomerUpdate;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Covers;

class ProfileController extends Controller
{
    public function showFormProfile() {
        $customerCheck = Auth::guard('customer')->check();
        if ($customerCheck) {
            $customer = Auth::guard('customer')->user();
        }
        return view('auth.customer.profile', compact('customer'));
    }

    public function profile(Request $request, $id) {
        $inputs = $request->only('name', 'password', 'email', 'phone_number', 'address');

        $rules = [
            'name' => 'required|min:6|unique:customers,name,' . $id,
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
        return redirect()->back()->with('success', 'Cập nhật tài khoản thành công...!');
    }
}
