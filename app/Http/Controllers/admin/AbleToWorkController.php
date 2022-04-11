<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkAbility;
use App\UserInfo;
class AbleToWorkController extends Controller
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
            'sun' => 'max:10', 
            'mon' => 'max:10', 
            'tue' => 'max:10', 
            'wed' => 'max:10', 
            'thu' => 'max:10', 
            'fri' => 'max:10', 
            'sat' => 'max:10',             
            ]);
        $work_per_week=UserInfo::where('user_id',$id)->count();
        if($work_per_week > 0){
            $work_per_week=UserInfo::where('user_id',$id)->first();
            $work_per_week->work_per_week=$request->work_per_week;
            $work_per_week->update();
        }
        else{
            $work_per_week=new UserInfo;
            $work_per_week->user_id=$id;
            $work_per_week->work_per_week=$request->work_per_week;
            $work_per_week->save();
        }

       $able=WorkAbility::where('user_id',$id)->get();
       if($able->count()==1){
            $able=WorkAbility::where('user_id',$id)->first();
            $able->sun_start=$request->sun_start;
            $able->sun_end=$request->sun_end;
            $able->mon_start=$request->mon_start;
            $able->mon_end=$request->mon_end;
            $able->tue_start=$request->tue_start;
            $able->tue_end=$request->tue_end;
            $able->wed_start=$request->wed_start;
            $able->wed_end=$request->wed_end;
            $able->thu_start=$request->thu_start;
            $able->thu_end=$request->thu_end;
            $able->fri_start=$request->fri_start;
            $able->fri_end=$request->fri_end;
            $able->sat_start=$request->sat_start;
            $able->sat_end=$request->sat_end;
            $able->update();
            
       }
            
        else{
            $able=new WorkAbility;
            $able->user_id=$id;
            $able->sun_start=$request->sun_start;
            $able->sun_end=$request->sun_end;
            $able->mon_start=$request->mon_start;
            $able->mon_end=$request->mon_end;
            $able->tue_start=$request->tue_start;
            $able->tue_end=$request->tue_end;
            $able->wed_start=$request->wed_start;
            $able->wed_end=$request->wed_end;
            $able->thu_start=$request->thu_start;
            $able->thu_end=$request->thu_end;
            $able->fri_start=$request->fri_start;
            $able->fri_end=$request->fri_end;
            $able->sat_start=$request->sat_start;
            $able->sat_end=$request->sat_end;
            $able->save();
        }
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
