<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=Page::orderBy('id','ASC')->get();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about_us()
    {
        $about=Page::where('id',2)->first();
        
        return view('admin.pages.about',compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $content=Page::find($id);
       return  view('admin.pages.view',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $content=Page::where('slug',$slug)->first();

        return view('admin.pages.edit',compact('content'));
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
        
        $page=Page::find($id);
        $page->desc=$request->content;
        //image
        if($request->image !=''){ 
             $this->validate(request(),[
            'image' => 'required | mimes:jpeg,png,bmp,jpg | max:1024',             
            ]);
            
            $destinationPath =   public_path('/images/frontend/page-banner/');
            $file = $request->image;
            $ext = $request->image->getClientOriginalExtension();
            $fileName = 'banner-'.$page->slug.'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $page->banner = $fileName;
        }
        if(isset($request->status)){
            $page->status=1;
        }
        else{
             $page->status=0;            
        }

        // SEO
        $page->keywords=$request->keywords;
        $page->meta_desc=$request->content;
        $page->og_url=$request->og_url;
        //OG image
        
        if($request->og_image !=''){
            $destinationPath = public_path('images/seos');
            $file = $request->og_image;
            $ext = $request->og_image->getClientOriginalExtension();
            $fileName = rand().$page->id.'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $page->og_image = $fileName;
        }
        $page->save();
        return redirect()->back()->with('success','Successfully Updated!');
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
