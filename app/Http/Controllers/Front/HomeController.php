<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.home.index', []);
    }

    public function profile()
    {
        return view('front.profile.index');
    }

    public function updateProfile(Request $request, $id)
    {
        $validator = validator($request->all(), $this->rules($id), $this->messages());
        if ($validator->fails()) {
            session()->flash('error', $validator->errors());
            return back();
        }
        // dd($request->all());

        $data = $request->except(['image', 'password']);

        try {
            $resource = User::where('id', $id)->first();

            if ($request->file('image')) {
                if ($resource->image) {
                    $path = $resource->image ? public_path($resource->image) : null;
                    if ($path) {
                        unlink($path);
                    }
                }
                $requestFileName = $request->file('image');

                $realName = $requestFileName->getClientOriginalName();
                $file = $requestFileName;
                $filename = $requestFileName->hashName();
                $file->move("uploads/dashboard/users/", $filename);
                $fullpath = "uploads/dashboard/users/" . $filename;
                $data['image'] = $fullpath;
            }

            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }

            $resource->update($data);

            session()->flash('success', __('lang.updated_successfully'));
            return back();
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }




    public function rules($userId)
    {
        return [
            'name' => 'required|string|max:150',
            'image' => 'required_if:id,==,null|image|mimes:jpeg,jpg,png',
            "email" => 'required|unique:users,email,' . $userId,
            'phone' => 'required|unique:users,phone,' . $userId,
        ];
    }

    public function messages()
    {
        return [
            'required' => 'this input must be required',
            'string' => 'this input must be string',
            'image' => 'this input must be image',
            "email" => 'this input must be email',
            'unique' => 'this input must be unique',
        ];
    }
}
