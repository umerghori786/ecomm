<?php

namespace App\Http\Controllers\Admin;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::OrderByDesc('id')->get();
       return view('backend.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp', // Example validation rules
        ]);
        $filename = time().'.'.$request->image->Extension();
        $request->image->move(public_path('slider'),$filename);
        Slider::create(['url'=>$request->url,'image'=>$filename]);

        return redirect()->route('slider.index')->with('success','created successfully');
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
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit',compact('slider'));
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
        $slider = Slider::find($id);

        if($request->has('image'))
        {
            $filename = time().'.'.$request->image->Extension();
            $request->image->move(public_path('slider'),$filename);
            $destination = 'slider/'.$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->update(['image'=>$filename]);
        }
        
        
        $slider->update(['url'=>$request->url]);

        return redirect()->route('slider.index')->with('success','Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(!$slider){
            return redirect()->route('slider.index')->with('error','Resource not found');
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Resource deleted successfully');
    }
}
