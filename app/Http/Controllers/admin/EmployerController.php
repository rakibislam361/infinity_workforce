<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\AssignedCandidate;
use App\EmployerInfo;

// mail
use Session;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heading="Employer List";
        //$employers=EmployerInfo::orderBy('company_name','ASC')->get();
        $employers=User::orderBy('created_at','DESC')->where('role_id',3)->get();
        $companies=EmployerInfo::orderBy('created_at','DESC')->get();
        return view('admin.employer.index',compact('employers','heading','companies'));
    }
    public function users(){
        $heading="Employer List";
        $employers=User::orderBy('created_at','DESC')->where('role_id',3)->get();
        $companies=EmployerInfo::orderBy('created_at','DESC')->get();
        return view('admin.employer.employer_user',compact('employers','heading','companies'));
    }
    public function create(){
        return view('admin.employer.create');
    }
     public function store(Request $request){
       $employer=new EmployerInfo;
        $employer->company_name=$request->name;
        $employer->phone=$request->phone;
        $employer->email=$request->email;
         $employer->license=$request->license;
        //$employer->website=$request->website;
        $employer->address=$request->address;
       
        $employer->details=$request->details;
        if($request->logo !=''){
            $destinationPath =   public_path('/images/employer/');
            $file = $request->logo;
            $ext = $request->logo->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $emp_info->image = $fileName;
        }
       if(isset($request->status)){
            $employer->status=$request->status;
       }
       else{
           $employer->status=0;
       }
       
        $employer->save();
        return redirect(route('admin-employer'))->with('success','Successfully Added Employer!');
    }
    public function profile($id)
    {
        $employer=EmployerInfo::find($id);
        $assigned_candidates=AssignedCandidate::where('employer_id',$id)->get();
        $users = User::where('company_id',$id)->get();
       

        return view('admin.employer.profile',compact('employer','assigned_candidates','users'));
    }
    public function basic_update(Request $request,$id){
        $this->validate(request(),[
            //'image' => 'mimes:jpeg,png,bmp,jpg|max:1024',             
            ]); 
        $emp_info=EmployerInfo::find($id);
        $emp_info->company_name=$request->name;
        $emp_info->phone=$request->phone;
        $emp_info->email=$request->email;
        $emp_info->license=$request->license;
        $emp_info->address=$request->address;
        $emp_info->details=$request->details;
        
        //image
        if($request->logo !=''){
            $destinationPath =   public_path('/images/employer/');
            $file = $request->logo;
            $ext = $request->logo->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $emp_info->image = $fileName;
        }
        $emp_info->save();
        return redirect()->back()->with('success','Successfully Updated!');
    }

     // status
    public function status(Request $request,$id){
        $employer=EmployerInfo::find($id);
        if(isset($request->status)){
            $employer->status=1;
            $employer->save();
            return redirect()->back()->with('success','Successfully Active Employer Account!');
        }
        else{
            $employer->status=0;
            $employer->save();
            return redirect()->back()->with('success','Successfully Deactive Employer Account!');
        }
  

    }
    public function delete($id){
         $employer=EmployerInfo::find($id);
         $employer->delete();
          return redirect()->back()->with('success','Successfully Deleted Employer Account!');
    }
   
}
