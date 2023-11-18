<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hello');
        $contact = Contact::with('user')->get();
        return view('backend.contact.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('hello');
        return view('backend.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'contact' => 'required',
            'email' => 'required|email',
            'location' => 'required',
            'facebook' => 'required',
            'x' => 'required',
            'skype' => 'required',
            'youtube' => 'required',

        ]);
        Contact::create([
            'contact'=>$request->contact,
            'email'=>$request->email,
            'location'=>$request->location,
            'facebook'=>$request->facebook,
            'x'=>$request->x,
            'skype'=>$request->skype,
            'youtube'=>$request->youtube,
            'user_id'=>auth()->user()->id,
        ]);
        return redirect()->route('contact.index')->with('success','created successfully');

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
        $contact = contact::findOrFail($id);
        return view('backend.contact.edit',compact('contact'));
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
        $contact = Contact::findOrFail($id);
        $request->validate([
            'contact' => 'required',
            'email' => 'required|email',
            'location' => 'required',
            'facebook' => 'required',
            'x' => 'required',
            'skype' => 'required',
            'youtube' => 'required',

        ]);
        $contact->update([
            'contact'=>$request->contact,
            'email'=>$request->email,
            'location'=>$request->location,
            'facebook'=>$request->facebook,
            'x'=>$request->x,
            'skype'=>$request->skype,
            'youtube'=>$request->youtube,
            'user_id'=>auth()->user()->id,
        ]);
        return redirect()->route('contact.index')->with('success','update successfully');
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
