<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SelfFund;
class SelfManagedController extends Controller
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
    public function update(Request $request)
    {
        $user_id=$request->user_id;
        $fund=SelfFund::where('user_id',$user_id)->count();
        if($fund==1){
            $fund=SelfFund::where('user_id',$user_id)->first();
            $fund->user_id= $user_id;
            if(isset($request->number)){
            $this->validate(request(),[
                "number" => "min:3|max:50",                    
                ]); 
                $fund->number=$request->number;
            }
            if(isset($request->abn)){
                $this->validate(request(),[
                 "abn" => "min:3|max:50",                    
                ]);
                $fund->abn=$request->abn;
            }
            if(isset($request->esa)){
                $this->validate(request(),[
                 "esa" => "min:3|max:50",                    
                ]);
                $fund->esa=$request->esa;
            }
            if(isset($request->usi_code)){
                $this->validate(request(),[
                 "usi_code" => "min:3|max:50",                    
                ]);
                $fund->usi_code=$request->usi_code;
            }
            if(isset($request->membership_number)){
                $this->validate(request(),[
                 "membership_number" => "min:3|max:50",                    
                ]);
                $fund->membership_number=$request->membership_number;
            }
            if(isset($request->acc_name)){
                $this->validate(request(),[
                 "acc_name" => "min:3|max:50",                    
                ]);
                $fund->acc_name=$request->acc_name;
            }
            $fund->update();
            return redirect()->back()->with('success','Sucessfully Updated Self Managed Super Fund !');


        }
        else{
            $fund=new SelfFund;
            $fund->user_id= $user_id;
            if(isset($request->number)){
            $this->validate(request(),[
                "number" => "min:3|max:50",                    
                ]); 
                $fund->number=$request->number;
            }
            if(isset($request->abn)){
                $this->validate(request(),[
                 "abn" => "min:3|max:50",                    
                ]);
                $fund->abn=$request->abn;
            }
            if(isset($request->esa)){
                $this->validate(request(),[
                 "esa" => "min:3|max:50",                    
                ]);
                $fund->esa=$request->esa;
            }
            if(isset($request->usi_code)){
                $this->validate(request(),[
                 "usi_code" => "min:3|max:50",                    
                ]);
                $fund->usi_code=$request->usi_code;
            }
            if(isset($request->membership_number)){
                $this->validate(request(),[
                 "membership_number" => "min:3|max:50",                    
                ]);
                $fund->membership_number=$request->membership_number;
            }
            if(isset($request->acc_name)){
                $this->validate(request(),[
                 "acc_name" => "min:3|max:50",                    
                ]);
                $fund->acc_name=$request->acc_name;
            }
            $fund->save();
            return redirect()->back()->with('success','Sucessfully Added Self Managed Super Fund !');
           
        }
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
