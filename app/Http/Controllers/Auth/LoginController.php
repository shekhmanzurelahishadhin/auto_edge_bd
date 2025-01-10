<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    protected function authenticated($request, $user)
    {
        if ($user) {
            $this->redirectTo = route('user.dashboard');
        }else{
            $this->redirectTo = route('admin.dashboard');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.login');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin.login', ['route' => route('admin.login-view'), 'title' => 'Admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]
        );

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->get('remember'))) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
