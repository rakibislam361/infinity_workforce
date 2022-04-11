<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Widget;
use App\Social;
use App\EmployerInfo;
use Hash;
use Auth;
// mail
use Session;
use Mail;
use App\Mail\NewCandidateRegister;
use App\Mail\NewCandidateMailAdmin;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::logout();
        $widgets=Widget::where('status',1)->get();
        $socials=Social::where('status',1)->get();
        return view ('frontend.register',compact('widgets','socials'));
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
    public function employer_register()
    {
       

       Auth::logout();
        $widgets=Widget::where('status',1)->get();
        $socials=Social::where('status',1)->get();
        return view('frontend.register-employer',compact('widgets','socials','job'));

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

     

        return redirect()->route('admin-users')->with('success','Successfully Created!'); 

    }
    // register employer ()
    public function employer_store(Request $request){
        $this->validate(request(),[
            
            'email' => 'required|unique:users,email', 
            'role' => 'required', 
            'password' => 'required|same:password_confirmation|min:6|max:30', 
            'password_confirmation' => 'required|same:password|min:6|max:30', 
                     
            ]); 
        $data = new User;

        $data->email=$request->email;
        $data->role_id=$request->role;
        $hashed = Hash::make($request->password);
        $data->password=$hashed;
        $data->status=1;
        $data->save(); 

        // create company
        $employer=new EmployerInfo;
        $employer->email= $data->email;
        $employer->save();

        $data->company_id=$employer->id;
        $data->update();

        $user_id=$data->id;
         //mail to candidate
        $data=User::where('id',$user_id)->first();
        Mail::to($data->email)->send(new NewCandidateRegister($data)); 
        
       //mail to admin
        $data=User::where('id',$user_id)->first();

        //$admin=User::where('role_id',1)->where('status',1)->pluck('email');
       // $admin= json_decode($admin);
        $admin= 'info@infinityworkforce.com.au';
        Mail::to($admin)->send(new NewCandidateMailAdmin($data,$admin));

        return redirect()->back()->with('success','Successfully Requested For Employer Account!'); 
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
