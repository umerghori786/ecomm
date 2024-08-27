<?php

namespace App\Http\Controllers\Admin;
use App\Models\Logo;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $logo = Logo::with('user')->first();
        return view ('backend.logo.index',compact('logo'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.logo.create');
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
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif|max:2048', // Example validation rules
        ]);
       
        $filename= time().'.'.$request->image->Extension();
        $request->image->move(public_path('logo'),$filename);

        $logo = new Logo;
        $logo->image = $filename;
        $logo->user_id = auth()->user()->id;
        $logo->save();
        return redirect()->route('logos.index')->with('success','created successfully');
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
        $logo = Logo::findOrFail($id);
        return view('backend.logo.edit',compact('logo'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
        ]);
        $logo = Logo::find($id);
        $filename= time().'.'.$request->image->Extension();
        $request->image->move(public_path('logo'),$filename);
        $destination = 'logo/'.$logo->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $logo->image = $filename;
        $logo->user_id = auth()->user()->id;
        $logo->save();
        return redirect()->route('logos.index')->with('success','Update successfully');
        
        

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
