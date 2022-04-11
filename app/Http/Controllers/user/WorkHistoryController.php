<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\UserInfo;
use App\WorkHistory;
use Hash;
use Auth;
class WorkHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $user=Auth::user();
        return view('user.register.work_history',compact('user'));
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
        $active=session()->put('active',2);
        $this->validate(request(),[
            'work_experience_company_name' => 'required|max:190', 
            'work_experience_start_date' => 'required', 
            'work_experience_position' => 'required|max:190', 
                        
            ]);
        
       if($request->work_experience_start_date && $request->work_experience_company_name && $request->work_experience_position){
            $work=new WorkHistory;
            $work->start=$request->work_experience_start_date;
            $work->user_id=$request->user_id;    
            $work->end=$request->work_experience_end_date; 
            $work->position=$request->work_experience_position;
            $work->company=$request->work_experience_company_name;
            $work->save();
           
            return redirect()->route('user-profile')->with('success','Successfully Added Work Experienc!')->with('active',3); 
        }
        else{
           $active=session()->put('active',2);
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
      // return back()->with('success','Sucessfully Deleted Work History !');
        return redirect()->route('user-profile')->with('success','Sucessfully Deleted Work History')->with('active',2); 
    }
}
