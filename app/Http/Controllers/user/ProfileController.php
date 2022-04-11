<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\UserInfo;
use App\WorkHistory;
use Hash;
use Auth;
use App\Country;
use App\WorkingCategory;

class ProfileController extends Controller
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
        $user=Auth::user();
        $countries=Country::where('status',1)->get();
        $categories=WorkingCategory::where('status',1)->get();
        return view('user.profile.profile', compact('user','countries','categories'));
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
        $this->validate(request(),[
            'first_name' => 'required', 
            'email' => 'required|unique:users,email',
            //'password' => 'required', 
            'image' => 'mimes:jpeg,png,bmp |max:1024',             
            ]); 
        $data = new user;
       
        $data->name = $request->first_name;

        $data->email=$request->email;
        $data->role_id=$request->role;

        if(isset($request->password)){
          $hashed = Hash::make($request->password);
           $data->password=$hashed;
        }
        
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
        $user_info->mid_name=$request->middle_name;
        $user_info->last_name=$request->last_name;
        $user_info->phone=$request->phone;
        $user_info->address=$request->address;
        $user_info->save();
        return redirect()->route('admin-users')->with('success','Successfully Created!'); 

    }
    public function user_info_store(Request $request,$id){
        
        $this->validate(request(),[
            'start' => 'required', 
            'company_name' => 'required', 
                        
            ]);
       
        if($request->start='01 Jan 1970'){
            return $request->start;
        }
        else{
            $work=new WorkHistory;
            $work->start=$request->start;
            $work->user_id=$id;    
            $work->end=$request->end; 
            $work->position=$request->position;
            $work->company=$request->company_name;
            $work->save();
        }

       return redirect()->back()->with('success','Successfully Updated!');
    }
    //visa,start,end,position,company_name 
    // eligible,car,
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(){
      $user=Auth::user();
      return view('user.profile.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        
       
       $this->validate(request(),[ 
            'email' => 'required|unique:users,email,'.$id, 
                       
            ]); 
        $data =User::find($id);
       
      $data->name = $request->first_name;

        $data->email=$request->email;
       // $data->role_id=$request->role;
       
        //image
        if($request->image !=''){
             $this->validate(request(),[ 
            'image' => 'mimes:jpeg,png,bmp |max:1024',            
            ]);
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

        $data->update(); 

        $user_info=UserInfo::where('user_id',$id)->count();
        if($user_info==1){
            $user_info=UserInfo::where('user_id',$id)->first();

            $user_info->user_id=$id;
            $user_info->mid_name=$request->middle_name;
            $user_info->last_name=$request->last_name;
            $user_info->phone=$request->phone;
            $user_info->address=$request->address;
            $user_info->save();
        }
        else{
            $user_info=new UserInfo;
            $user_info->user_id=$id;
            $user_info->mid_name=$request->middle_name;
            $user_info->last_name=$request->last_name;
            $user_info->phone=$request->phone;
            $user_info->address=$request->address;
            $user_info->save();
        }        
        return redirect()->route('user-profile')->with('success','Successfully Updated Profile!');
    }
    public function password_change(){
      $user=Auth::user();
      return view('user.change-password.index',compact('user'));
    }
    public function password_update(Request $request){
      $user=Auth::user();
      $this->validate(request(),[
            'password' => 'required|min:6|max:25',             
            ]); 
      $user_id=$request->user_id;
        $data =User::find($user_id);
        $hashed = Hash::make($request->password);
        $data->password=$hashed;
        $data->save();
        return redirect()->back()->with('success','Successfully Updated Password!');
    }

    public function image_update(Request $request, $id)
    {
       $this->validate(request(),[ 
            'image' => 'mimes:jpeg,png,bmp |max:1024',            
            ]); 
        $data =User::find($id);
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
            $data->update();  
        }
            
        return redirect()->route('user-profile')->with('success','Successfully Updated Profile!');
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
