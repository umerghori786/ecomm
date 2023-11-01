<?php

namespace App\Http\Controllers\Admin;
use App\Models\Privacy;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request()->all());
        $privacy = Privacy::with('user')->first();
        return view('backend.privacy.index',compact('privacy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(request()->all());
        return view('backend.privacy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('Hello Haseeb');
        $privacy = new Privacy;
        $privacy->privacy = $request->input('privacy');
        $privacy->user_id = auth()->user()->id;
        $privacy->save(); 
        // dd($privacy);
        return redirect()->route('privacy.index')->with('success','created successfully');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $privacy = Privacy::findOrFail($id);
        return view('backend.privacy.edit',compact('privacy'));
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
        $privacy = Privacy::find($id);
        $privacy->privacy = $request->input('privacy');
        $privacy->user_id = auth()->user()->id;
        $privacy->update();
        return redirect()->route('privacy.index')->with('success','Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
    }
}
