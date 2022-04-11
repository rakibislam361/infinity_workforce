<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Bank;
use App\User;


class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $banks = Bank::all();
        $users = User::all();

        return view('admin.bank.index', compact('banks', 'users'));
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
        /* $this->validate(request(),[
             "account_name" => "required|min:3|max:50",
             "ac_no" => "required|min:3|max:50",                     
             "user" => "required",                     
            ]);*/
        $user_id = $request->user;
        $bank = Bank::where('user_id', $user_id)->count();

        if ($bank > 0) {
            $bank = Bank::where('user_id', $user_id)->first();
            $bank->ac_name = $request->account_name;
            $bank->user_id = $user_id;
            $bank->bsb = $request->bsb;
            $bank->ac_no = $request->ac_no;
            /*$bank->abn=$request->abn;
            $bank->tfn=$request->tfn;*/
            $bank->update();
            return redirect()->back()->with('success', 'Sucessfully Updated Bank Info !');
        } else {
            $bank = new Bank;
            $bank->ac_name = $request->account_name;
            $bank->user_id = $user_id;
            $bank->bsb = $request->bsb;
            $bank->ac_no = $request->ac_no;
            $bank->abn = $request->abn;
            $bank->tfn = $request->tfn;
            $bank->save();
            return redirect()->back()->with('success', 'Sucessfully Created Bank Info !');
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
        $bank = Bank::find($id);
        $bank->delete();
        return redirect(route('admin-banks'))->with('success', 'Sucessfully Deleted Bank Info !');
    }
}
