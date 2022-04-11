<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkingCategory;
use Illuminate\Support\Str;
class WorkCategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=WorkingCategory::orderBy('name')->get();
        return view('admin.work-category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=WorkingCategory::where('status',1)->get();
       return view('admin.work-category.create', compact('categories'));
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
             "title" => "required",
                
            ]); 
        $category=new WorkingCategory;
        $category->name=$request->title;
        

        if(isset($request->status)){
            $category->status=1;
        }
        else{
             $category->status=0;
        }

        $category->save();
        return redirect()->route('admin-work-categories')->with('success','Successfully Created Work Category!');
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
       
       $category=WorkingCategory::find($id);
       return view('admin.work-category.edit', compact('category'));
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
             "title" => "required",                
            ]); 
        $category=WorkingCategory::find($id);
        $category->name=$request->title;
        $category->slug=Str::slug($request->title);
        

        if(isset($request->status)){
            $category->status=1;
        }
        else{
             $category->status=0;
        }

        $category->save();
        return redirect()->route('admin-work-categories')->with('success','Successfully Updated Work Category!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,$id){
        $category=WorkingCategory::find($id);
        if(isset($request->status)){
            $category->status=1;
            $category->save();
            return redirect()->back()->with('success','Successfully Published Work Category!');
        }
        else{
             $category->status=0;
             $category->save();
             return redirect()->back()->with('success','Successfully Unpublished Work Category!');
        }
  

    }
    public function destroy($id)
    {
        $cat=WorkingCategory::find($id);
        $cat->delete();
        //$work->category->detach();
        return redirect()->back()->with('success','Successfully Deleted Category!');
    }
}
