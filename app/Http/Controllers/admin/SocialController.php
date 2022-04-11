<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Social;
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials=Social::get();
        return view('admin.social.index',compact('socials'));
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
         $this->validate(request(),[
            'name' => 'required', 
            'link' => 'required', 
                  
            ]);
        $social=new Social;
        $social->name=$request->name;
        $social->link=$request->link;
        $social->icon=$request->icon;
        $social->color=$request->color;
        $social->hover_color=$request->h_color;
        if(isset($request->status)){
            $social->status=1;
        }
        else {
             $social->status=0;
        }
        $social->save();
        return redirect(route('admin-socials'))->with('success','Successfully Created Social !');
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
        
         $this->validate(request(),[
            'name' => 'required', 
            'link' => 'required', 
                  
            ]);
        $social=Social::find($id);
        $social->name=$request->name;
        $social->link=$request->link;
        $social->icon=$request->icon;
        $social->color=$request->color;
        $social->hover_color=$request->h_color;
        if(isset($request->status)){
            $social->status=1;
        }
        else {
             $social->status=0;
        }
        $social->update();
        return redirect(route('admin-socials'))->with('success','Successfully Updated Social !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social=Social::find($id);
        $social->delete();
        return redirect(route('admin-socials'))->with('success','Successfully Deleted Social !');
    }
}
