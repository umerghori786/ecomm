<?php

namespace App\Http\Controllers\Admin;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ques = Question::with('user')->get();
        return view ('backend.question.index',compact('ques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(request()->all());
        return view('backend.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // foreach($request->question as $key=>$ques){
            // dd($ques);
            $ans = new Question;
            $ans->question = $request->input('question');
            $ans->answer = $request->input('answer');
            $ans->user_id = auth()->user()->id;
            $ans->save();
        // }
        return redirect()->route('question.index')->with('success','created successfully');


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
        $ques = Question::findorFail($id);
        return view('backend.question.edit',compact('ques'));
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
        // dd($id);
        $ques = Question::find($id);
        $ques->question = $request->input('question');
        $ques->answer = $request->input('answer');
        $ques->user_id = auth()->user()->id;
        // dd($ques);
        $ques->update();
        return redirect()->route('question.index')->with('success','update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('hello haseeb');
        $ques = Question::find($id);

        if (!$ques) {
            return redirect()->route('question.index')->with('error', 'Resource not found');
        }
    
        $ques->delete();
    
        return redirect()->route('question.index')->with('success', 'Resource deleted successfully');
    
    }
}
