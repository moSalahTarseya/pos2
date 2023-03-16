<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('lang')) {
            if (in_array($request->get('lang'), ['ar','en'])){
                if (!Session::has('locale')) {
                    Session::put('locale', $request->get('lang'));
                } else {
                    Session::put('locale', $request->get('lang'));
                }
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
