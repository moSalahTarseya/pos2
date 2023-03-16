<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = User::latest();

        if(request()->search){
            $query->where('name', 'like', '%' . request()->search . '%');
        }

        $user = request()->user_id > 0? User::find(request()->user_id): new User();

        $data = $query->paginate(24);
        return view('dashboard.users.index',compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resource =  new User();

        return view('dashboard.users.form',compact('resource','countryCodes', 'roles'));
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

        $data = $request->except(['password']);

        try {

            $data['password'] = bcrypt($request->password);
            $resource = User::create($data);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.users.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource =  User::where('id',$id)->first();


        return view('dashboard.users.form', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
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
            $resource = User::where('id',$id)->first();



            if($request->password){
                $data['password'] = bcrypt($request->password);
            }

            $resource->update($data);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.users.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = User::findOrFail($id);

        $resource->delete();

        session()->flash('success',__('lang.deleted'));
        return back();
    }

    public function destroyMulti(Request $request)
    {
        try {
            foreach ($request->resource as $res) {
                $resource = User::where('id',$res['itemId'])->first();

                $resource->Delete();
            }

            session()->flash('success',__('lang.done'));
            return redirect()->route('dashboard.users.index');
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    public function rules ($userId){
        return [
            'name'=>'required|string|max:150',
            "email" =>'required|unique:users,email,' . $userId ,
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
