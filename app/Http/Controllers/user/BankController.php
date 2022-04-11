<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use Auth;
class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user=Auth::user();
       return view('user.bank.index',compact('user'));
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
    public function store(Request $request,$id)
    {
        $this->validate(request(),[
             "account_name" => "required|min:3|max:50",
             "ac_no" => "required|max:50",                     
            ]); 
        $user=Auth::user();
        $bank=Bank::where('user_id',$id)->count();
        
        if($bank==1){
            $bank=Bank::where('user_id',$id)->first();
            $bank->ac_name=$request->account_name;
            $bank->user_id=$id;
            $bank->bsb=$request->bsb;
            $bank->ac_no=$request->ac_no;
            $bank->abn=$request->abn;
            $bank->tfn=$request->tfn;
            $bank->update();
            return redirect()->route('user-profile')->with('success','Successfully Updated Bank Info !')->with('active',8);
            //return redirect(route('user-bank'))->with('success','Sucessfully Updated Bank Info !');
        }
        else{
            $bank=new Bank;
            $bank->ac_name=$request->account_name;
            $bank->user_id=$id;
            $bank->bsb=$request->bsb;
            $bank->ac_no=$request->ac_no;
            $bank->abn=$request->abn;
            $bank->tfn=$request->tfn;
            $bank->save();
            return redirect()->route('user-profile')->with('success','Successfully Updated Bank Info !')->with('active',8);
            //return redirect(route('user-bank'))->with('success','Sucessfully Updated Bank Info !');
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
        //
    }
}
