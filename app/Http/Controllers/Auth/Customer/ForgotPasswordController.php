<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Mail\MailForgotPassword;
use App\Mail\MailResetPassword;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showFormForgotPassword() {
        return view('auth.customer.passwords.email');
    }

    public function forgotPassword(Request $request) {
        $inputs = $request->only('email');

        $rules = [
            'email' => 'required|email'
        ];
        $request->validate($rules);
        $mailCheck = $inputs['email'];
        $customer = Customer::where('email', $mailCheck)->first();
        $token = Str::random(60);
        $customer->remember_token = $token;
        $customer->save();
        $link = route('customer.reset-password')."?token=$token";

        if ($customer) {
            \Mail::to($customer->email)->send(new MailForgotPassword($customer->name, $link));
        }

        $request->session()->flash('success', 'Gửi link đặt lại mật khẩu thành công...');
        return redirect()->back();
    }

    public function showFormResetPassword(Request $request) {
        $inputs = $request->only('response', 'token');
        $validator = \Validator::make($inputs, [
            'response' => 'required|in:accept',
            'token' => 'required|exists:customers,remember_token'
        ]);
        if ($validator->fails()) {
            abort(404);
        }
        $customer = Customer::where('remember_token', $inputs['token'])->first();
        return view('auth.customer.passwords.reset', compact('customer'));
    }

    public function resetPassword(Request $request) {
        $inputs = $request->only('email', 'password');

        $rules = [
            'email' => 'required|exists:customers,email',
            'password' => 'required|min:8'
        ];
        $request->validate($rules);
        $inputs['password'] = Hash::make($request->password);

        $customer = Customer::where('email', $request->email)->first();
        $customer->fill($inputs);
        $customer->save();

        if ($customer) {
            \Mail::to($customer->email)->send(new MailResetPassword($customer, $request->password));
        }

        return redirect('customer/login')->with('success', 'Đổi mật khẩu thành công, vui lòng kiểm tra email.');
    }
}
