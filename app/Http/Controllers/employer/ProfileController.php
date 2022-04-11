<?php

namespace App\Http\Controllers\employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmployerInfo;
use App\AssignedCandidate;
use App\User;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       if(Auth::user()->status==1){
            $employer_id= Auth::user()->id;
            $office_id=  Auth::user()->company_id;
            $employer=User::find($employer_id);

            if($employer->status==1){
               $employer=User::find($employer_id); 
            }
            
            if(is_null($office_id)){
               $users='';
            }
           else{
             $users = User::where('company_id',$office_id)->where('status',1)->get();
           }
          
            return view('employer.profile.index',compact('employer','users'));
        }
    else {
          
        return redirect()->route('employer-block-account'); 
        }

       
    
    }
    public function basic_update(Request $request,$id){
        $this->validate(request(),[
            //'image' => 'mimes:jpeg,png,bmp,jpg|max:1024',             
            ]); 
         $employer_office=User::where('id',$id)->first();
        $employer_company_id= $employer_office->company_id;

        $emp_info=EmployerInfo::where('id',$employer_company_id)->first();
        if($emp_info){
           
            $emp_info=EmployerInfo::where('id',$employer_company_id)->first();
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
            $emp_info->update();
            return redirect()->back()->with('success','Successfully Updated!');
        }
        else{
           $emp_info=new EmployerInfo;
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

            $employer=User::where('id',$id)->first();
            $employer->company_id=$emp_info->id;
            $employer->save();
            return redirect()->back()->with('success','Successfully Created!');
        }
       
       
    }
    // status
    public function status(Request $request,$id){
        $user=User::find($id);
        if(isset($request->status)){
            $user->status=1;
            $user->save();
            return redirect()->back()->with('success','Successfully Active User!');
        }
        else{
             $user->status=0;
             $user->save();
             return redirect()->back()->with('success','Successfully Deactive User!');
        }
  

    }
    public function assingn_user_remove($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success','Successfully Delete User!');
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
