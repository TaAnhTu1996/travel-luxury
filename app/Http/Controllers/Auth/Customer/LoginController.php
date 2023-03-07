<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\Customer;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME; //Redirect after authenticate

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout'); //Notice this middleware
        $this->redirectTo = url()->previous();
    }

    public function showFormLogin() //Go web.php then you will find this route
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.customer.login');
    }

    public function login(Request $request) //Go web.php then you will find this route
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        return redirect()->back();
    }

    protected function guard() // And now finally this is our custom guard name
    {
        return Auth::guard('customer');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/customer/login');
        }
        // only allow people with @company.com to login
        if(explode("@", $user->email)[1] !== 'gmail.com'){
            return redirect()->to('/');
        }
        // check if they're an existing user
        $existingUser = Customer::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth('customer')->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new Customer;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->save();
            auth('customer')->login($newUser, true);
        }
        return redirect()->to('/');
    }
}
