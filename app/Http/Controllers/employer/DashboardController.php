<?php

namespace App\Http\Controllers\employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\AssignedCandidate;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){
        if(Auth::user()->status==1){
            if(Auth::user()->office){
                $employer_id=Auth::user()->office->id;
                $company_id=Auth::user()->company_id;
               
                $assigned_candidates=AssignedCandidate::where('employer_id',$employer_id)->count();
                $company_users=User::where('company_id',$company_id)->count();
            }
            else{
                $assigned_candidates=0;
                $company_users=0;
            }
      
        
        return view('employer.dashboard',compact('assigned_candidates','company_users'));
        }
        else {
          
        return redirect()->route('employer-block-account'); 
        }
        
    }
}
    

