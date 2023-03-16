<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Department;
use App\Models\Job;
use App\Models\Role;
use App\Models\Admin;
use App\Models\CountryCode;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:dashboard_read-admins'])->only('index');
        $this->middleware(['permission:dashboard_create-admins'])->only('create');
        $this->middleware(['permission:dashboard_update-admins'])->only('edit');
        $this->middleware(['permission:dashboard_delete-admins'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Admin::latest();

        if(request()->search){
            $query->where('name', 'like', '%' . request()->search . '%');
        }

        $admin = request()->admin_id > 0? Admin::find(request()->admin_id): new Admin();

        $data = $query->paginate(24);
        return view('dashboard.admins.index',compact('data', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resource =  new Admin();

        $roles = Role::latest()->get();
        $countryCodes = CountryCode::latest()->get();
        return view('dashboard.admins.form',compact('resource','countryCodes', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),$this->rules(null), $this->messages());
        if($validator->fails()){
            session()->flash('error', $validator->errors());
            return back();
        }
        // dd($request->all());

        $data = $request->except(['image', 'password']);

        try {
            if($request->file('image')){
                $requestFileName = $request->file('image');

                $realName = $requestFileName->getClientOriginalName();
                $file = $requestFileName;
                $filename = $requestFileName->hashName();
                $file->move("uploads/dashboard/admins/", $filename);
                $fullpath = "uploads/dashboard/admins/" . $filename;
                $data['image'] = $fullpath;
            }
            $data['password'] = bcrypt($request->password);
            $resource = Admin::create($data);
            $resource->attachRole($data['role']);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.admins.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource =  Admin::where('id',$id)->first();
        $roleId = $resource->roles()->first()->id ?? 0;

        $roles = Role::latest()->get();
        $countryCodes = CountryCode::latest()->get();

        return view('dashboard.admins.form', compact('resource','roleId',  'roles', 'countryCodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),$this->rules($id), $this->messages());
        if($validator->fails()){
            session()->flash('error', $validator->errors());
            return back();
        }
        // dd($request->all());

        $data = $request->except(['image', 'password']);

        try {
            $resource = Admin::where('id',$id)->first();

            if($request->file('image')){
                if($resource->image){
                    $path = $resource->image? public_path($resource->image) : null;
                    if($path){
                        unlink($path);
                    }
                }
                $requestFileName = $request->file('image');

                $realName = $requestFileName->getClientOriginalName();
                $file = $requestFileName;
                $filename = $requestFileName->hashName();
                $file->move("uploads/dashboard/admins/", $filename);
                $fullpath = "uploads/dashboard/admins/" . $filename;
                $data['image'] = $fullpath;
            }
            if($request->password){
                $data['password'] = bcrypt($request->password);
            }

            $resource->update($data);
            $resource->syncRoles([$data['role']]);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.admins.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Admin::findOrFail($id);

        $resource->delete();

        session()->flash('success',__('lang.deleted'));
        return back();
    }

    public function destroyMulti(Request $request)
    {
        try {
            foreach ($request->resource as $res) {
                $resource = Admin::where('id',$res['itemId'])->first();

                $resource->Delete();
            }

            session()->flash('success',__('lang.done'));
            return redirect()->route('dashboard.admins.index');
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    public function rules ($userId){
        return [
            'username'=>'required|string|max:150',
            'image' => 'required_if:id,==,null|image|mimes:jpeg,jpg,png',
            "email" =>'required|unique:admins,email,' . $userId ,
            'phone' => 'required|unique:admins,phone,' . $userId ,
        ];
    }

    public function messages (){
        return [
            'required'=>'this input must be required',
            'string'=>'this input must be string',
            'image' => 'this input must be image',
            "email" =>'this input must be email',
            'unique' => 'this input must be unique',
        ];
    }
}
