<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Country;
use App\UserInfo;
use App\Bank;
// mail
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCandidateRegister;
use App\Mail\NewCandidateMailAdmin;
class RegistationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $countries=Country::where('status',1)->get();
        return view('user.register.index',compact('user','countries'));
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
        
    }
    public function basic_info_store(Request $request,$id){
          $this->validate(request(),[ 
            'first_name' => 'required|min:3,max:50',            
            'last_name' => 'required|max:20',            
            //'nickname' => 'required|max:20',            
            'gender' => 'required', 
            'current_address' => 'required', 
            'town_city' => 'required', 
            'postcode' => 'required', 
            'country' => 'required', 
            'calling_code' => 'required', 
            'phone' => 'required', 
            'purpose' => 'required', 
            'travel_to_work' => 'required', 
                      
            //'image' => 'required|mimes:jpeg,png,bmp |max:1024',            
            'visa' => 'required|numeric',                    
            'work_per_week' => 'required|numeric|max:168|min:1',
            //'medical_check' => 'required|max:168',
            //'police_check' => 'required|max:168',
            
                        
            ]); 

           // email + password +photo

        $info=UserInfo::where('user_id',$id)->get();
        
        if($info->count()==1){
            $user_info=UserInfo::where('user_id',$id)->first();
            $user_info->user_id=$id;
            $user_info->first_name=$request->first_name;
            $user_info->mid_name=$request->nickname; //nickname
            $user_info->last_name=$request->last_name;
            if(isset($request->gender)){
                $user_info->gender=$request->gender;
            }
            else{
                $user_info->gender=0;
            }
            
            $user_info->address=$request->current_address;
            $user_info->town_city=$request->town_city;
            $user_info->postcode=$request->postcode;
            if(isset($request->country)){
               $user_info->country_id=$request->country;
            }
            else{
               $user_info->country_id=0;
            }

            if(isset($request->calling_code)){
               $user_info->calling_code=$request->calling_code;
            }
            else{
                $user_info->calling_code=0;
            }

           
            $user_info->phone=$request->phone;
            $user_info->purpose=$request->purpose;
            //new
            if(isset($request->visa)){
                $user_info->visa=$request->visa;
            }
            if(isset($request->visa_exp)){
                $user_info->visa_exp=$request->visa_exp;
            }
            if(isset($request->medical_check)){
                $user_info->medical_check_date=$request->medical_check;
            }
            if(isset($request->police_check)){
                $user_info->police_check_date=$request->police_check;
            }
            $user_info->work_per_week=$request->work_per_week;
           
            $user_info->travel_to_work=$request->travel_to_work;
            
            $user_info->update();

           
        }
        else{
            $user_info= new UserInfo;
            $user_info->user_id=$id;
            $user_info->first_name=$request->first_name;
            $user_info->mid_name=$request->nickname; //nickname
            $user_info->last_name=$request->last_name;
            if(isset($request->gender)){
                $user_info->gender=$request->gender;
            }
            else{
                $user_info->gender=0;
            }
            
            $user_info->address=$request->current_address;
            $user_info->town_city=$request->town_city;
            $user_info->postcode=$request->postcode;
            
            if(isset($request->country)){
               $user_info->country_id=$request->country;
            }
            else{
               $user_info->country_id=0;
            }

            if(isset($request->calling_code)){
               $user_info->calling_code=$request->calling_code;
            }
            else{
                $user_info->calling_code=0;
            }

           
            $user_info->phone=$request->phone;
            $user_info->purpose=$request->purpose;
            //new
            if(isset($request->visa)){
                $user_info->visa=$request->visa;
            }
            if(isset($request->visa_exp)){
                $user_info->visa_exp= date('dd-mm-yyyy', strtotime($request->visa_exp));
            }
            
            if(isset($request->medical_check)){
                $user_info->medical_check_date=date('dd-mm-yyyy', strtotime($request->medical_check));
            }
            if(isset($request->police_check)){
                $user_info->police_check_date=date('dd-mm-yyyy', strtotime($request->police_check));
            }
            $user_info->work_per_week=$request->work_per_week;
           
            $user_info->travel_to_work=$request->travel_to_work;
            
            $user_info->save();
        }
        // user Table
        $data =User::find($id);
        //$data->email=$request->email;
        //image
        if($request->image !=''){
            $this->validate(request(),[ 
                'image' => 'required|mimes:jpeg,png,bmp,jpg,PNG |max:1024'
            ]);
            
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
        
        // user bank info
        if(isset($request->tfn) || isset($request->abn)){
            $bank_info=Bank::where('user_id',$id)->get();

            if($bank_info->count()>0){
                $bank_info=Bank::where('user_id',$id)->first();
                $bank_info->abn=$request->abn;
                $bank_info->tfn=$request->tfn;
                $bank_info->update();
            }
            else{
                $bank_info=new Bank;
                $bank_info->user_id=$id;
                $bank_info->abn=$request->abn;
                $bank_info->tfn=$request->tfn;
                $bank_info->save();
            }
           

        }
        
        //mail to candidate
        $data=User::where('id',$id)->first();
        Mail::to($data->email)->send(new NewCandidateRegister($data)); 
        //mail to admin
        $data=User::where('id',$id)->first();

       /* $admin=User::where('role_id',1)->where('show_status',1)->where('status',1)->pluck('email');*/
        /*
        
        $admin= 'info@infinityworkforce.com.au';
        Mail::to($admin)->send(new NewCandidateMailAdmin($data,$admin));
       */
        return redirect()->route('user-profile')->with('success','Successfully Updated!')->with('active',2); 

        
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
