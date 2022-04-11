<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkHistory;
class WorkHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            //'visa' => 'required', 
            'start' => 'required', 
           // 'end' => 'required', 
                        
            ]);

       if($request->start){
            $work=new WorkHistory;
            $work->start=$request->start;
            $work->user_id=$request->user_id;
            if(!empty($request->end) && $request->end){
                $work->end=$request->end; 
            } 
           
            $work->position=$request->position;
            $work->company=$request->company_name;
            $work->save();
            return redirect()->back()->with('success','Successfully Added Work History!');
        }
        else{
           
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $work=WorkHistory::find($id);
       $work->delete();
       return back()->with('success','Sucessfully Deleted Work History !');
    }
}
