<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\Login;
use App\Models\Admin;

class AuthController extends Controller
{
    protected $viewPath = 'dashboard.auth.';
    protected $urlPath = 'dashboard/login';

    public function __construct(Admin $model)
    {

    }


    /**
     * Show Page Login Admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view()
    {
        return view('dashboard.auth.login');
    }


    /**
     * Login Admin
     * @param Login $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Login $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);
        $admin = Admin::where('email',$request->email)->first();

        if(isset($admin)){
            if (auth('admin')->attempt($credentials)) {
                return redirect()->route('dashboard');
            }else{
                session()->flash('message', 'Invalid credentials');
                return redirect()->back();
            }
        }else{
            session()->flash('error', 'Invalid credentials');
            return back();
        }
    }


    /**
     * Filter Member Credentials
     * @param $request
     * @return array|bool
     */
    private function credentials($request)
    {
        $inputs = $request->validated();

        if(is_numeric($inputs['email'])) {
            return ['phone' => $inputs['email'], 'password' => $inputs['password']];
        }
        elseif (filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
            return ['email' => $inputs['email'], 'password' => $inputs['password']];
        }
        return false;
    }


    /**
     * Return MSG Error
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function invalid($request)
    {
        return back()->with('error', __('lang.invalid_data'))->withInput($request->validated());
    }

    /**
     * Logout Admin
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        if(auth('admin')->check()){
            auth('admin')->logout();
            request()->session()->invalidate();
        }
        return redirect($this->urlPath);
    }
}
