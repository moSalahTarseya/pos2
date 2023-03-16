<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Language\StoreLanguage;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Language::latest();

        if(request()->search){
            $query->where('title', 'like', '%' . request()->search . '%');
        }

        $language = request()->language_id > 0? Language::find(request()->language_id): new Language();

        $data = $query->paginate(24);
        return view('dashboard.languages.index',compact('data', 'language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resource =  new Language();

        return view('dashboard.languages.form',compact('resource'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguage $request)
    {
        // dd($request->all());
        $data = $request->validated();

        try {

            if($request->hasFile('img')){
                $requestFileName = $request->file('img');

                $realName = $requestFileName->getClientOriginalName();
                $file = $requestFileName;
                $filename = $requestFileName->hashName();
                $file->move("uploads/dashboard/languages/", $filename);
                $fullpath = "uploads/dashboard/languages/" . $filename;
                $data['img'] = $fullpath;
            }
            $resource = Language::create($data);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.languages.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource =  Language::where('id',$id)->first();

        return view('dashboard.languages.form', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLanguage $request, $id)
    {

        // dd($request->all());
        $data = $request->validated();

        try {
            $resource = Language::where('id',$id)->first();

            if($request->hasFile('img')){
                //delete old img
                if($resource->img){
                    $path = $resource->img? public_path($resource->img) : null;
                    if(file_exists($path)){
                        unlink($path);
                    }
                }
                $requestFileName = $request->file('img');

                $realName = $requestFileName->getClientOriginalName();
                $file = $requestFileName;
                $filename = $requestFileName->hashName();
                $file->move("uploads/dashboard/languages/", $filename);
                $fullpath = "uploads/dashboard/languages/" . $filename;
                $data['img'] = $fullpath;
            }

            $resource->update($data);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.languages.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Language::findOrFail($id);
        //to delete img
        if($resource->img){
            $path = $resource->img? public_path($resource->img) : null;
            if(file_exists($path)){
                unlink($path);
            }
        }
        $resource->delete();

        session()->flash('success',__('lang.deleted'));
        return back();
    }

    public function destroyMulti(Request $request)
    {
        try {
            foreach ($request->resource as $res) {
                $resource = Language::where('id',$res['itemId'])->first();
                //to delete img
                if($resource->img){
                    $path = $resource->img? public_path($resource->img) : null;
                    if(file_exists($path)){
                        unlink($path);
                    }
                }
                $resource->Delete();
            }

            session()->flash('success',__('lang.done'));
            return redirect()->route('dashboard.languages.index');
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

}
