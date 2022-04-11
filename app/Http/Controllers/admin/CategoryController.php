<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;
use App\Category;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('name','ASC')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics=Topic::where('status',1)->get();
        return view('admin.category.create',compact('topics'));
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

        $user=Auth::user();
        $category = new Category;
        $category->name = $request->name;
        $category->pass_mark = $request->passed;
     
        if(isset( $request->attempted) && !empty( $request->attempted)){
            $this->validate(request(),[
                'attempted' => 'required|numeric',
             ]); 
            $category->attempted = $request->attempted;
        }
        
        $category->time = $request->time;
        $category->question_no = $request->question_no;
        $category->created_by = $user->id;
        if(isset($request->topic)){
            $category->topic_id=$request->topic;
        }
        if(isset($request->status)){
            $category->status=$request->status;
        }
        else{
            $category->status=0;
        }
        $category->description=$request->desc;
        $category->save(); 

        return redirect()->route('admin-category')->with('success','Category Added Successfully !');
    }

    public function status(Request $request,$id){
        $category=Category::find($id);
        if(isset($request->status)){
            $category->status=1;
            $category->save();
            return redirect()->back()->with('success','Successfully Active Category!');
        }
        else{
             $category->status=0;
             $category->save();
             return redirect()->back()->with('success','Successfully Deactive Category!');
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
        $category = Category::find($id);
         $topics=Topic::where('status',1)->get();
        return view('admin.category.edit', compact('category','topics'));
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

        $user=Auth::user();
        $category = Category::find($id);
        $category->name = $request->name;
          $category->pass_mark = $request->passed;
        if(isset( $request->attempted) && !empty( $request->attempted)){
            $this->validate(request(),[
                'attempted' => 'required|numeric',
             ]); 
            $category->attempted = $request->attempted;
        }
        $category->time = $request->time;
        $category->question_no = $request->question_no;
        if(isset($request->topic)){
            $category->topic_id=$request->topic;
        }
        if(isset($request->status)){
            $category->status=$request->status;
        }
        else{
            $category->status=0;
        }
        $category->description=$request->desc;
        $category->updated_by = $user->id;
        $category->save(); 

        return redirect()->route('admin-category')->with('success','Category Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin-category')->with('success','Category Deleted Successfully !');
    }
}
