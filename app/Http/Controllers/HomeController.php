<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    } 
    public function user_redirect()
    {
        $user_role=Auth::user()->role_id;
       if($user_role==1){
           return redirect()->route('admin-dashboard');
       }
       elseif($user_role==2){
           return redirect()->route('user-profile');
       }
       elseif($user_role==3){
           return redirect()->route('employer-dashboard');
       }
       else{
             return redirect()->route('frontend-home');
       }
    }
}
