<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Language;
use Illuminate\Http\Request;

class AdminController extends Controller
{



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
        $languages = Language::latest()->get();

        return view('dashboard.admins.form',compact('resource', 'languages'));
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

            $data['password'] = bcrypt($request->password);
            $resource = Admin::create($data);


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
        $languages = Language::latest()->get();
        return view('dashboard.admins.form', compact('resource', 'languages'));
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

        $data = $request->except(['password']);

        try {
            $resource = Admin::where('id',$id)->first();


            if($request->password){
                $data['password'] = bcrypt($request->password);
            }

            $resource->update($data);


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
            'name'=>'required|string|max:150',
            "email" =>'required|unique:admins,email,' . $userId ,
            "language_id" =>'nullable',
        ];
    }

    public function messages (){
        return [
            'required'=>'this input must be required',
            'string'=>'this input must be string',
            "email" =>'this input must be email',
            'unique' => 'this input must be unique',
        ];
    }
}
