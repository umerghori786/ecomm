<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Traits\ImageUploadTrait;
use App\Models\{
    SubCategory,
    Category,
    Product,
    Color,
};

class ProductController extends Controller
{   
    use ImageUploadTrait;
    protected $popular;
    protected $trending;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::with('subcategory.category')->orderByDesc('id')->get();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::pluck('title','id')->prepend('select Category','');
        $subcategories = SubCategory::pluck('title','id')->prepend('select Sub Category','');
        $colors = Color::where('status',1)->pluck('title','id');
        $cloths = Color::where('status',2)->pluck('title','id');
        $shoes = Color::where('status',3)->pluck('title','id');

        return view('backend.products.create',compact('categories','subcategories','colors','cloths','shoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {   
        $data = $request->validated();
        $product = Product::create($data);
        $this->imageUpload($request,$product,$product->id);
        $product->update(['popular'=>$this->popular,'trending'=>$this->trending,'user_id'=>auth()->user()->id]);
        if(count($request->color_id) > 0)
        {
            $product->update(['color_id'=>implode(',', $request->color_id)]);
        }
        if(count($request->clothsize_id) > 0)
        {
            $product->update(['clothsize_id'=>implode(',', $request->clothsize_id)]);
        }
        if(count($request->shoesize_id) > 0)
        {
            $product->update(['shoesize_id'=>implode(',', $request->shoesize_id)]);
        }

        return redirect()->route('products.index')->with('success','created successfully');
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
        $subcategories = SubCategory::pluck('title','id')->prepend('select Sub Category','');
        $product = Product::findOrFail($id);
        $colors = Color::where('status',1)->pluck('title','id');
        $cloths = Color::where('status',2)->pluck('title','id');
        $shoes = Color::where('status',3)->pluck('title','id');

        return view('backend.products.edit',compact('subcategories','categories','product','colors','cloths','shoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {   
        $data = $request->validated();
        $product = Product::where('id',$id)->first();
        $product->update($data);
        $this->imageUpload($request,$product,$product->id);
        $product->update(['popular'=>$this->popular,'trending'=>$this->trending]);
        if(count($request->color_id) > 0)
        {
            $product->update(['color_id'=>implode(',', $request->color_id)]);
        }
        if(count($request->clothsize_id) > 0)
        {
            $product->update(['clothsize_id'=>implode(',', $request->clothsize_id)]);
        }
        if(count($request->shoesize_id) > 0)
        {
            $product->update(['shoesize_id'=>implode(',', $request->shoesize_id)]);
        }

        return redirect()->route('products.index')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index')->with('success','deleted successfully');
    }
    /*
    *dependent subcategory
    */
    public function showSubCategory(Request $request)
    {
        $sub_categories = SubCategory::where('category_id',$request->category_id)->get();
        return response()->json(['sub_categories'=>$sub_categories],200);
    }
    /*
    *check popular or trending
    */
    public function __construct(Request $request)
    {
        if ($request->has('trending')) {
             $this->trending = 1;
        }else{
             $this->trending = 0;
        }
        if ($request->has('popular')) {
            $this->popular = 1;
        }else{
            $this->popular = 0;
        }
    }
}
