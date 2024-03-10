<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\ImageUploadTrait;
use File;
use App\Models\{
    Product,
    Image
};

class ImageController extends Controller
{   
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $product = Product::with('images')->findOrFail($request->product_id);
        return view('backend.images.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {   
        $this->imageUpload($request,$product,$request->product_id);

        return redirect()->route('images.index',['product_id'=>$request->product_id])->with('success','added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {   
        $pro = Product::findOrFail($request->product_id)->images()->where('id',$id)->first();
        $file_name = basename(parse_url($pro->url, PHP_URL_PATH));
        
        if(File::exists(public_path('/product/'.$file_name))){
            File::delete(public_path('/product/'.$file_name));
        }
        $pro->delete();
        return redirect()->back()->with('success','deleted successfully');
    }
}
