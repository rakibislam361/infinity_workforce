<?php

namespace App\Http\Controllers\employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssignedCandidate;
use App\User;
use App\Role;
use App\UserInfo;
use App\WorkHistory;
use App\Country;
use App\Work;
use App\WorkingCategory;
use App\EmployerInfo;
use Hash;

use Auth;
class AssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->status==1 && @$employer_office=Auth::user()->office->status==1){
            $data_name='';
            $data_email='';
            $data_suburb='';
            $data_visa='';

            $employer_id=Auth::user()->company_id;
            $candidates=AssignedCandidate::orderBy('id')->where('employer_id',$employer_id)->pluck('user_id')->toArray();   
            $users = User::whereIn('id',$candidates)->paginate(50);

            return view('employer.candidate.index',compact('users','candidates','data_name','data_email','data_suburb','data_visa'));
           
            //return view('employer.candidate.index',compact('candidates','assigned_candidates'));
        }
      
        else{
            return redirect()->route('employer-block-account');
        }

    }
    // assigned candidate profile
    public function assigned_candidate_profile($id){

        $employer_id=Auth::user()->company_id;
        $candidate=AssignedCandidate::orderBy('id')->where('employer_id',$employer_id)->where('user_id',$id)->pluck('user_id');   
        
        if($candidate->count()==1){
            $user= User::where('id',$candidate)->where('role_id',2)->first();
            //
            $roles=Role::where('status',1)->get();
            $countries=Country::where('status',1)->get();
            $categories=WorkingCategory::where('status',1)->get();
            $u_work=User::where('id',$id)->first();
            $u_work=$u_work->user_to_works;
            
            $companies=EmployerInfo::where('status',1)->orderBy('company_name')->get();
            //

            return view('employer.candidate.profile.profile',compact('user','roles','countries','categories','u_work','companies'));
        }
        else{
            return redirect()->route('employer-assigned-candidate');
        }
        
        
        
    }
    // search
    public function user_search(Request $request)
    {
        
        if(Auth::user()->status==1 && @$employer_office=Auth::user()->office->status==1){
                if(isset($request->name))
                $data_name= $request->name;
            else 
                {
                    
                 $data_name= '';
                }

            if(isset($request->email))
                $data_email= $request->email;
            else 
                $data_email='';

            if(isset($request->suburb))
                 $data_suburb= $request->suburb;
               else 
                 $data_suburb='';

            if(isset($request->visa))
                $data_visa= $request->visa;
            else 
                $data_visa=0;

            if(isset($request->job))
                $data_job= $request->job;
            else 
                $data_job=0;
            if(isset($request->idn)){
                $data_id=$request->idn;
            }
            else{
                $data_id='';
            }
            if(isset($request->phone)){
                $data_phone=$request->phone;
            }
            else{
                $data_phone='';
            }

            $jobs = Work::where('status',1)->orderBy('title','ASC')->get();
            $candidates=User::with(['info','wish_to_works'])->where('role_id',2);
            if($data_name !=''){
               
                $candidates = $candidates->whereHas('info', function ($query) use ($data_name) {
                    $query = $query->where('first_name','LIKE','%'.$data_name.'%');
                }
                );
            }
            if($data_email !=''){
               $candidates= $candidates->where('email','LIKE','%'.$data_email.'%');
            }

            if($data_suburb !=''){
               
                $candidates = $candidates->whereHas('info', function ($query) use ($data_suburb) {
                    $query = $query->where('town_city','LIKE','%'.$data_suburb.'%');
                }
                );
            }
            if($data_visa>0){
               
                $candidates = $candidates->whereHas('info', function ($query) use ($data_visa) {
                    $query = $query->where('visa',$data_visa);
                }
                );
            }

            if($data_job>0)
            {
                $candidates = $candidates->whereHas('wish_to_works', function ($query) use ($data_job) {
                    $query = $query->where('work_id',$data_job);
                }
            );
            }
            if($data_id>0)
            {
                $candidates= $candidates->where('id',$data_id);
            
            }
             if($data_phone>0)
            {
                $candidates = $candidates->whereHas('info', function ($query) use ($data_phone) {
                    $query = $query->where('phone',$data_phone);
                }
            );
            }
            
            $employer_id=Auth::user()->company_id;
            $candidates=AssignedCandidate::orderBy('id')->where('employer_id',$employer_id)->pluck('user_id')->toArray();   
            $users = User::whereIn('id',$candidates)->paginate(50);
            
            
            //$users=User::where('role_id',2)->orderBy('name')->get();
            return view('employer.candidate.index',compact('users','data_name','data_email','data_suburb','data_visa','data_id'));
        } // status check
        else{
            return redirect()->route('employer-block-account');
        }
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
