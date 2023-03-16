<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        // Users Count
        $usersCount = User::count();
        // Users Count
        $adminsCount = Admin::count();


        $admins = [
            "count" => Admin::count(),
            "desc" => __('lang.add_admin') . ', ' . __('lang.edit_admin')
        ];



        return view('dashboard.home.index', compact(
            'usersCount',
            'admins',
            'adminsCount'
        ));
    }

    public function profile() {

        $resource = Admin::where('id', auth()->user()->id)->first();

        return view('dashboard.profile.index',compact('resource'));
    }
}
