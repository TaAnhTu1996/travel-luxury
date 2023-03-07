<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Mail\MailRegister;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function showFormRegister()
    {
        return view('auth.customer.register');
    }

    public function register(Request $request)
    {
        $inputs = $request->only('name', 'google_id', 'password', 'email', 'phone_number', 'address');

        $rules = [
            'name' => 'required|min:6|max:50|unique:customers',
            'google_id' => 'numeric',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:customers',
            'phone_number' => 'required|numeric|digits:10',
            'address' => 'required|min:3|max:100'
        ];
        $request->validate($rules);

        $inputs['password'] = Hash::make($request->password);

        $customer = Customer::create($inputs);

        if ($customer) {
            \Mail::to($customer->email)->send(new MailRegister($customer->name, $request->password, $customer));
        }
        return redirect('customer/login')->with('success', 'Tạo tài khoản thành công, vui lòng kiểm tra email của bạn...!');
    }
}
