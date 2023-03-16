<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:dashboard_read-roles'])->only('index');
        $this->middleware(['permission:dashboard_create-roles'])->only('create');
        $this->middleware(['permission:dashboard_update-roles'])->only('edit');
        $this->middleware(['permission:dashboard_delete-roles'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Session::get('isDark'));

        $query = Role::where('is_admin','1')->latest();

        if(request()->search){
            $query->where('name', 'like', '%' . request()->search . '%');
        }

        $role = request()->role_id > 0? Role::find(request()->role_id): new Role();

        $data = $query->paginate(24);
        return view('dashboard.roles.index',compact('data', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resource =  new Role();
        $permissions = Permission::where('is_admin','1')->latest()->get()->groupBy('category');

        return view('dashboard.roles.form',compact('resource', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),$this->rules());
        if($validator->fails()){
            session()->flash('error', $validator->errors());
            return back();
        }
        // dd($request->all());


        // dd($data);
        try {
            $data = $request->all();
            $data['is_admin'] = 1;
            DB::beginTransaction();

            $resource = Role::create($data);

            $resource->syncPermissions($data['permissions']);
            DB::commit();

            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.roles.index'));
        } catch (Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    public function show($id)
    {
        $resource =  Role::where('id',$id)->first();
        $permissions = Permission::where('is_admin','1')->latest()->get()->groupBy('category');

        $rolePermissions = $resource->permissions->pluck('id')->all();


        return view('dashboard.roles.show', compact('resource', 'permissions', 'rolePermissions'));
    }


    public function edit($id)
    {
        $resource =  Role::where('id',$id)->first();
        $permissions = Permission::where('is_admin','1')->latest()->get()->groupBy('category');

        $rolePermissions = $resource->permissions->pluck('id')->all();


        return view('dashboard.roles.form', compact('resource', 'permissions', 'rolePermissions'));
    }


    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),$this->rules());
        if($validator->fails()){
            session()->flash('error', $validator->errors());
            return back();
        }
        // dd($request->all());

        $data = $request->all();

        try {
            $resource = Role::where('id',$id)->first();


            $resource->update($data);
            $resource->syncPermissions($data['permissions']);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.roles.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }


    public function destroy($id)
    {
        $resource = Role::findOrFail($id);

        $resource->delete();

        session()->flash('success',__('lang.deleted'));
        return back();
    }

    public function destroyMulti(Request $request)
    {
        try {
            foreach ($request->resource as $res) {
                $resource = Role::where('id',$res['itemId'])->first();

                $resource->Delete();
            }

            session()->flash('success',__('lang.done'));
            return redirect()->route('dashboard.roles.index');
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    public function rules (){
        return [
            'name'=>'required|string|max:150',
            'display_name'=>'required|string|max:150',
            'description'=>'required|string|max:150',
        ];
    }
}
