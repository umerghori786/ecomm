<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\{
    SubCategory,
    Category
};

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $sub_categories = SubCategory::with('category')->orderByDesc('id')->get();
        return view('backend.subcategory.index',compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id')->prepend('select Category','');
        return view('backend.subcategory.create',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
        ]);
        $filename = time().'.'.$request->image->Extension();
        $request->image->move(public_path('sub_category'),$filename);
        $request->validate([
            'category_id'=>'required'
        ]);

        if ($request->has('status')) {
            $status = 1;
        }else{
            $status = 0;
        }

        SubCategory::create(['title'=>$request->title,'category_id'=>$request->category_id,'image'=>$filename,'status'=>$status]);
        return redirect()->route('subcategories.index')->with('success','created successfully');
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
        $categories = Category::pluck('title','id')->prepend('select Category','');
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.edit',compact('subcategory','categories'));
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $subcategory = SubCategory::Find($id);
        $filename = time().'.'.$request->image->Extension();
        $request->image->move(public_path('sub_category'),$filename);
        $distination = 'sub_category/'.$request->image;
        if(File::exists($distination)){
            File::delete($distination);
        }
        $request->validate([
            'category_id'=>'required'
        ]);

        if ($request->has('status')) {
            $status = 1;
        }else{
            $status = 0;
        }
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update(['title'=>$request->title,'category_id'=>$request->category_id,'image'=>$filename,'status'=>$status]);
        return redirect()->route('subcategories.index')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
