<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

//            if (Auth::guard($guard)->check() && Auth::guard('admin')->user()->type === 'department_admin') {
//                return to_route('admin.department.dashboard');
//            }
//
//            if (Auth::guard($guard)->check() && Auth::guard('admin')->user()->type === 'institute_admin') {
//                return to_route('admin.institute.dashboard');
//            }
//
//            if (Auth::guard($guard)->check() && Auth::guard('admin')->user()->type === 'office_admin') {
//                return to_route('admin.office.dashboard');
//            }

            if ($guard == 'admin' && Auth::guard($guard)->check()) {
                return redirect('/admin/dashboard');
            }

            if (Auth::guard($guard)->check()) {
                //return redirect(RouteServiceProvider::HOME);
                return to_route('user.dashboard');
            }
        }

        /* if (Auth::guard($guard)->check() && Auth::user()->type == 'admin') {
            return redirect()->route('app.dashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->type == 'teacher') {
            return redirect()->route('app.teacherDashboard');
        } else {
            return $next($request);
        }*/

        return $next($request);
    }
}
