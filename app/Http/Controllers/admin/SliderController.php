<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides=Slider::orderBy('sl','ASC')->get();
        return view('admin.slider.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slider;
        $slide->caption=$request->caption;
        $slide->sl=$request->serial;
        $slide->status=$request->status;
        //image
        if($request->image !=''){
            // delete previous image
            $destinationPath =   public_path('/images/frontend/slider/');
            $file = $request->image;
            $ext = $request->image->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $slide->image = $fileName;
        }
        $slide->save();
        return redirect()->route('admin-slider')->with('success','Successfully Added Slide!');
    }
    public function status(Request $request,$id){
        
        $slider=Slider::find($id);
        if(isset($request->status)){
            $slider->status=1;
            $slider->save();
            return redirect()->back()->with('success','Successfully Active Slide!');
        }
        else{
             $slider->status=0;
             $slider->save();
             return redirect()->back()->with('success','Successfully Deactive Slide!');
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
        //
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
        /*$this->validate(request(),[
            'image' => 'mimes:jpeg,png,bmp |max:1024',                         
            ]); */
        $slide = Slider::find($id);
        $slide->caption=$request->caption;
        $slide->sl=$request->serial;
        $slide->status=$request->status;
        //image
        if($request->image !=''){
            // delete previous image
            $folder=public_path('/images/frontend/slider/');
            $file= $slide->image;
            $file= $folder.''.$file;
            unlink($file);

            $destinationPath =   public_path('/images/frontend/slider/');
            $file = $request->image;
            $ext = $request->image->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $slide->image = $fileName;
        }
        $slide->save();
        return redirect()->route('admin-slider')->with('success','Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slider::find($id);

        $folder=public_path('images/frontend/slider/');
        $file= $slide->image;
        $file= $folder.''.$file;
        unlink($file);
       
        $slide->delete();
        return redirect()->route('admin-slider')->with('success','Successfully Deleted!');
    }
}
