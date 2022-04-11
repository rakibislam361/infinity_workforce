<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics=Topic::orderBy('name','ASC')->get();
        return view('admin.topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required|max:50',
            'time' => 'numeric',
            'question_no' => 'numeric',
            ]); 

        $topic = new Topic;
        $topic->name = $request->name;
        $topic->time = $request->time;
        $topic->question_no = $request->question_no;
        $topic->save(); 

        return redirect()->back()->with('success','Topic Added Successfully !');
    }

    public function status(Request $request,$id){
        $topic=Topic::find($id);
        if(isset($request->status)){
            $topic->status=1;
            $topic->save();
            return redirect()->back()->with('success','Successfully Active Topic!');
        }
        else{
             $topic->status=0;
             $topic->save();
             return redirect()->back()->with('success','Successfully Deactive Topic!');
        }
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
        $topic = Topic::find($id);
        return view('admin.topic.edit', compact('topic'));
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
        $this->validate(request(),[
            'name' => 'max:50',
            'time' => 'numeric',
            'question_no' => 'numeric',
            ]); 

        $topic = Topic::find($id);
        $topic->name = $request->name;
        $topic->time = $request->time;
        $topic->question_no = $request->question_no;
        $topic->save(); 

        return redirect()->action('Admin\TopicController@index')->with('success','Topic Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topic::find($id)->delete();
        return redirect()->action('Admin\TopicController@index')->with('success','Topic Deleted Successfully !');
    }
}
