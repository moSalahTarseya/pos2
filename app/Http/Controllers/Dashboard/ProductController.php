<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\StoreProduct;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Product::latest();

        if(request()->search){
            $query->where('name', 'like', '%' . request()->search . '%');
        }

        $product = request()->product_id > 0? Product::find(request()->product_id): new Product();

        $data = $query->paginate(24);
        return view('dashboard.products.index',compact('data', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resource =  new Product();
        $languages = Language::latest()->get();

        return view('dashboard.products.form',compact('resource', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        // dd($request->all());
        $data = $request->validated();

        try {

            if($request->hasFile('img')){
                $requestFileName = $request->file('img');

                $realName = $requestFileName->getClientOriginalName();
                $file = $requestFileName;
                $filename = $requestFileName->hashName();
                $file->move("uploads/dashboard/products/", $filename);
                $fullpath = "uploads/dashboard/products/" . $filename;
                $data['img'] = $fullpath;
            }
            $resource = Product::create($data);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.products.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource =  Product::where('id',$id)->first();
        $languages = Language::latest()->get();

        return view('dashboard.products.form', compact('resource', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {

        // dd($request->all());
        $data = $request->validated();

        try {
            $resource = Product::where('id',$id)->first();

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
                $file->move("uploads/dashboard/products/", $filename);
                $fullpath = "uploads/dashboard/products/" . $filename;
                $data['img'] = $fullpath;
            }

            $resource->update($data);


            session()->flash('success',__('lang.done'));
            return redirect(route('dashboard.products.index'));
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Product::findOrFail($id);
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
                $resource = Product::where('id',$res['itemId'])->first();
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
            return redirect()->route('dashboard.products.index');
        } catch (\Exception $th) {
            session()->flash('error', $th->getMessage());
            return back();
        }
    }

}
