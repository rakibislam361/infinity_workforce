<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $services=Service::orderBy('title','ASC')->get();
       return view('admin.service.index',compact('services')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
        $service=new Service;
        $service->title=$request->title;
        $service->slug=str_slug($request->title);
       
        $service->long_desc=$request->desc;
        $service->short_desc=$request->short_desc;
        $service->short_link=$request->link;

        if(isset($request->status)){
            $service->status=1;
        }
        else{
             $service->status=0;
        }
        //image//image
        if($request->thumbnail !=''){
            $destinationPath =   public_path('/images/service/');
            $file = $request->thumbnail;
            $ext = $request->thumbnail->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $service->thumbnail = $fileName;
        }
        // banner
        if($request->banner !=''){
            $destinationPath =   public_path('/images/service/');
            $file = $request->banner;
            $ext = $request->banner->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $service->banner = $fileName;
        }

        $service->save();
        return redirect()->route('admin-service')->with('success','Successfully Created Service!');
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
        $service=Service::find($id);
        return view('admin.service.edit',compact('service'));
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
        $service=Service::find($id);
        $service->title=$request->title;
       
        $service->long_desc=$request->desc;
        $service->short_desc=$request->short_desc;
        $service->short_link=$request->link;

        if(isset($request->status)){
            $service->status=1;
        }
        else{
             $service->status=0;
        }
        //image//image
        if($request->thumbnail !=''){
            $destinationPath =   public_path('/images/service/');
            $file = $request->thumbnail;
            $ext = $request->thumbnail->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $service->thumbnail = $fileName;
        }
        // banner
        if($request->banner !=''){
            $destinationPath =   public_path('/images/service/');
            $file = $request->banner;
            $ext = $request->banner->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $service->banner = $fileName;
        }

        $service->save();
        return redirect()->route('admin-service')->with('success','Successfully Created Service!');
    }

    public function status(Request $request,$id){
        $service=Service::find($id);
        if(isset($request->status)){
            $service->status=1;
            $service->save();
            return redirect()->back()->with('success','Successfully Published Service!');
        }
        else{
             $service->status=0;
             $service->save();
             return redirect()->back()->with('success','Successfully Unpublished Service!');
        }
    }
    public function destroy($id)
    {
        $service=Service::find($id);
        $service->delete();
        //$work->category->detach();
        return redirect()->back()->with('success','Successfully Deleted Service!');
    }
}
