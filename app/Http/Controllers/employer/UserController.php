<?php

namespace App\Http\Controllers\employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserInfo;

use Hash;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(@$user=Auth::user()->office->status->status==1){
            $office_id=Auth::user()->office->id;
            $users=User::where('role_id',3)->where('company_id',$office_id)->orderBy('name')->get();
            return view('employer.user.index',compact('users'));
        
        }
    else {
          
        return redirect()->route('employer-block-account'); 
        }
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->status==1){
        $this->validate(request(),[
            'first_name' => 'required', 
            'email' => 'required|unique:users,email', 
            'role' => 'required', 
            'password' => 'required', 
            'image' => 'mimes:jpeg,png,bmp |max:1024',             
            ]); 
        $data = new User;
       
        $data->name = $request->first_name;
        if($request->company_id !=''){
            $data->company_id = $request->company_id;
        }

        $data->email=$request->email;
        $data->role_id=$request->role;
        $hashed = Hash::make($request->password);
        $data->password=$hashed;
        //image
        if($request->image !=''){
            $destinationPath =   public_path('/images/users');
            $file = $request->image;
            $ext = $request->image->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $data->image = $fileName;
        }

        $data->save(); 

        $user_info=new UserInfo;
        $user_info->user_id=$data->id;
        $user_info->first_name = $request->first_name;
        $user_info->mid_name=$request->middle_name;
        $user_info->last_name=$request->last_name;
        $user_info->phone=$request->phone;
        $user_info->address=$request->address;
        $user_info->save();
        //return redirect()->back()->with('success','Successfully Created!'); 

    }
    }
   

   
}
