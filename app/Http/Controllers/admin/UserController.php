<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\UserInfo;
use App\WorkHistory;
use App\Country;
use App\Work;
use App\Bank;
use App\UserWork;
use App\WorkingCategory;
// use Hash;
// 
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Hash;
// mail
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountStatus;
use App\EmployerInfo;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CsvExport;
use App\Interview;

class UserController extends Controller
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

    public function admin()
    {
        $heading = "Admin List";
        $users = User::where('role_id', 1)->where('show_status', 1)->orderBy('name')->get();
        return view('admin.user.admin-list', compact('users', 'heading'));
    }

    public function general_user()
    {
        $data_name = '';
        $data_email = '';
        $data_suburb = '';
        $data_visa = '';
        $data_phone = '';
        $data_id = '';
        $data_startdate = '';
        $data_enddate = '';


        $heading = "Candidate List";
        // $total_found = User::where('role_id', 2)->count();
        $total_found = User::whereNotIn('id', Interview::pluck('user_id')->toArray())->where('role_id', 2)->count();
        $users = User::whereNotIn('id', Interview::pluck('user_id')->toArray())->where('role_id', 2)->latest()->paginate();

        // return $users->interview;
        $jobs = Work::where('status', 1)->orderBy('title', 'ASC')->get();
        return view('admin.user.index', compact('data_startdate', 'data_enddate', 'users', 'heading', 'data_name', 'data_email', 'data_phone', 'data_id', 'data_suburb', 'data_visa', 'jobs', 'total_found'));
    }
    public function user_search(Request $request)
    {
        $data_startdate = request('start_date', '');
        $data_enddate = request('end_date', '');
        $data_visa = request('visa', 0);
        $data_name = request('name', '');
        $data_email = request('email', '');
        $data_suburb = request('suburb', '');
        $data_job = request('job', '');
        $data_id = request('idn', '');
        $data_phone = request('phone', '');

        $jobs = Work::where('status', 1)->orderBy('title', 'ASC')->get();
        $candidates = User::with('info', 'wish_to_works')->where('role_id', 2);

        if (!empty($data_startdate) & !empty($data_enddate)) {
            $candidates = User::whereBetween('created_at', [$data_startdate, $data_enddate]);
        }

        if (!empty($data_name)) {
            $candidates = $candidates->whereHas('info', function ($query) use ($data_name) {
                $query = $query->where('first_name', 'LIKE', '%' . $data_name . '%');
            });
        }

        if (!empty($data_email)) {
            $candidates = $candidates->where('email', 'LIKE', '%' . $data_email . '%');
        }

        if (!empty($data_suburb)) {
            $candidates = $candidates->whereHas('info', function ($query) use ($data_suburb) {
                $query = $query->where('town_city', 'LIKE', '%' . $data_suburb . '%');
            });
        }

        if (!empty($data_visa)) {
            $candidates = $candidates->whereHas('info', function ($query) use ($data_visa) {
                $query = $query->where('visa', $data_visa);
            });
        }

        if (!empty($data_job)) {
            $candidates = $candidates->whereHas('wish_to_works', function ($query) use ($data_job) {
                $query = $query->where('work_id', $data_job);
            });
        }

        if (!empty($data_id)) {
            $candidates = $candidates->where('id', $data_id);
        }

        if ($data_phone) {
            $candidates = $candidates->whereHas('info', function ($query) use ($data_phone) {
                $query = $query->where('phone', $data_phone);
            });
        }

        $total_found = $candidates->count();
        $users = $candidates->paginate(50);
        // dd($users->get());

        $heading = "Candidate List";
        return view('admin.user.index', compact('users', 'heading', 'data_name', 'data_email', 'data_suburb', 'data_visa', 'jobs', 'data_phone', 'data_id', 'total_found', 'data_job'));
    }

    public function excel(Request $req)
    {
        if (isset($req->from))
            $from = $req->from;
        else {

            $from = '';
        }
        if (isset($req->to))
            $to = $req->to;
        else {

            $to = '';
        }

        if ($from != '' & $to != '') {
            return Excel::download(new CsvExport($from, $to), 'Excel-reports.xlsx');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'dob' => 'required|date',
            'password' => 'required',
            'image' => 'mimes:jpeg,png,bmp |max:1024',
        ]);
        $data = new User;

        $data->name = $request->first_name;
        if ($request->company_id != '') {
            $data->company_id = $request->company_id;
        }

        $data->email = $request->email;
        $data->role_id = $request->role;
        $hashed = Hash::make($request->password);
        $data->password = $hashed;

        if ($request->web_image != '') {
            $img = $request->web_image;
            $folderPath =  public_path('/images/users/');

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($image_parts[1]);
            $fileName = date('Y_m_d_H_i') . '_' . rand(100, 10000) . '.png';

            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);

            $data->image = $fileName;
        }
        //image
        if ($request->image != '') {
            $destinationPath =   public_path('/images/users');
            $file = $request->image;
            $ext = $request->image->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i') . '_' . rand(100, 10000) . '.' . $ext;
            if (file_exists($destinationPath . '/' . $fileName)) {
                @unlink($destinationPath . '/' . $fileName);
            }
            $file->move($destinationPath, $fileName);
            $data->image = $fileName;
        }
        $data->save();

        $user_info = new UserInfo;
        $user_info->user_id = $data->id;
        $user_info->first_name = $request->first_name;
        $user_info->mid_name = $request->middle_name;
        $user_info->last_name = $request->last_name;
        $user_info->phone = $request->phone;
        $user_info->dob = $request->dob;
        $user_info->address = $request->address;
        $user_info->save();
        return redirect()->back()->with('success', 'Successfully Created User!');
    }

    public function user_info_store(Request $request, $id)
    {



        $info = UserInfo::where('user_id', $id)->first();
        if ($info->count() > 0) {

            if (isset($request->visa)) {
                $info->visa = $request->visa;
            }

            $info->eligible_to_work = $request->eligible;
            $info->travel_to_work = $request->car . ',' . $request->public;
            $info->travel_to_work = $request->license;
            $info->language = $request->language;
            $info->work_per_week = $request->work_per_week;
            $info->work_per_week = $request->work_per_week;

            $info->update();
        } else {
            $info = new UserInfo;
            if (isset($request->visa)) {
                $info->visa = $request->visa;
            }
            $info->eligible_to_work = $request->eligible;
            $info->travel_to_work = $request->car . ',' . $request->public;
            $info->travel_to_work = $request->license;
            $info->language = $request->language;
            $info->work_per_week = $request->work_per_week;
            $info->work_per_week = $request->work_per_week;
            $info->save();
            // return "save";
        }

        return redirect()->route('admin-user-edit', $id)->with('success', 'Successfully Updated!');
    }
    //visa,start,end,position,company_name 
    // eligible,car,
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::where('status', 1)->get();
        return view('admin.user.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $categories = WorkingCategory::where('status', 1)->get();
        $u_work = User::where('id', $id)->first();
        $u_work = $u_work->user_to_works;

        $companies = EmployerInfo::where('status', 1)->orderBy('company_name')->get();
        return view('admin.user.edit', compact('user', 'roles', 'countries', 'categories', 'u_work', 'companies'));
        // candidate wish to work


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

        $this->validate(request(), [
            'email' => 'required|unique:users,email,' . $id,
            'image' => 'mimes:jpeg,png,bmp |max:1024',
            'visa' => 'required',
            //'visa_exp' => 'required',            
            //'work_per_week' => 'required',            
            //'medical_check' => 'required',            
            // 'police_check' => 'required',            
        ]);

        // email + password +photo

        $info = UserInfo::where('user_id', $id)->get();

        if (isset($request->company) && !empty($request->company)) {
            $data = User::find($id);
            $data->company_id = $request->company;
            $data->save();
        }

        if (isset($request->password) && !empty($request->password)) {
            $data = User::find($id);
            $hashed = Hash::make($request->password);
            $data->password = $hashed;
            $data->update();
        }


        if ($info->count() == 1) {
            $user_info = UserInfo::where('user_id', $id)->first();
            $user_info->user_id = $id;
            $user_info->first_name = $request->first_name;
            $user_info->mid_name = $request->middle_name; //nickname
            $user_info->last_name = $request->last_name;
            if (isset($request->gender)) {
                $user_info->gender = $request->gender;
            } else {
                $user_info->gender = 0;
            }

            $user_info->dob = $request->dob;
            $user_info->address = $request->current_address;
            $user_info->town_city = $request->town_city;
            $user_info->postcode = $request->postcode;
            if (isset($request->country)) {
                $user_info->country_id = $request->country;
            } else {
                $user_info->country_id = 0;
            }

            if (isset($request->calling_code)) {
                $user_info->calling_code = $request->calling_code;
            } else {
                $user_info->calling_code = 0;
            }


            $user_info->phone = $request->phone;
            $user_info->purpose = $request->purpose;
            //new
            if ($request->visa !== null && !empty($request->visa)) {
                $user_info->visa = $request->visa;
            }
            /* if(isset($request->visa)){
                $user_info->visa=$request->visa;
            }*/

            if (isset($request->visa_exp) && $request->visa_exp == !NULL) {
                $user_info->visa_exp = $request->visa_exp;
            }
            if (isset($request->medical_check)) {
                $user_info->medical_check_date = $request->medical_check;
            }
            if (isset($request->police_check)) {
                $user_info->police_check_date = $request->police_check;
            }

            $user_info->work_per_week = $request->work_per_week;
            $user_info->travel_to_work = $request->travel_to_work;

            $user_info->save();
        } else {
            $user_info = new UserInfo;
            $user_info->user_id = $id;
            $user_info->first_name = $request->first_name;
            $user_info->mid_name = $request->middle_name;
            $user_info->last_name = $request->last_name;
            if (isset($request->gender)) {
                $user_info->gender = $request->gender;
            } else {
                $user_info->gender = 0;
            }

            $user_info->address = $request->current_address;
            $user_info->town_city = $request->town_city;
            $user_info->postcode = $request->postcode;
            if (isset($request->country)) {
                $user_info->country_id = $request->country;
            } else {
                $user_info->country_id = 0;
            }

            if (isset($request->calling_code)) {
                $user_info->calling_code = $request->calling_code;
            } else {
                $user_info->calling_code = 0;
            }


            $user_info->dob = $request->dob;
            $user_info->phone = $request->phone;
            $user_info->purpose = $request->purpose;
            //new
            if (isset($request->visa)) {
                $user_info->visa = $request->visa;
            }
            if (isset($request->visa_exp)) {
                $user_info->visa_exp = $request->visa_exp;
            }
            $user_info->work_per_week = $request->work_per_week;
            $user_info->travel_to_work = $request->travel_to_work;

            $user_info->save();
        }
        // user Table
        $data = User::find($id);
        $data->email = $request->email;
        $hashed = Hash::make($request->password);
        $data->password = $hashed;
        if (isset($request->role)) {
            $data->role_id = $request->role;
        }

        //image
        if ($request->image != '') {
            $this->validate(request(), [
                'image' => 'mimes:jpeg,png,bmp |max:1024',
            ]);

            $destinationPath =   public_path('/images/users');
            $file = $request->image;
            $ext = $request->image->getClientOriginalExtension();
            $fileName = date('Y_m_d_H_i') . '_' . rand(100, 10000) . '.' . $ext;
            if (file_exists($destinationPath . '/' . $fileName)) {
                @unlink($destinationPath . '/' . $fileName);
            }
            $file->move($destinationPath, $fileName);
            $data->image = $fileName;
        }

        $data->update();
        //bank info
        if ($request->abn || $request->tfn) {
            $bank = Bank::where('user_id', $id)->count();
            if ($bank > 0) {
                $bank = Bank::where('user_id', $id)->first();
                $bank->abn = $request->abn;
                $bank->tfn = $request->tfn;
                $bank->update();
            } else {
                $bank = new Bank;
                $bank->user_id = $id;
                $bank->abn = $request->abn;
                $bank->tfn = $request->tfn;
                $bank->save();
            }
        }
        // redirect to employer user list
        if ($data->role_id == 3) {
            return redirect()->route('admin-employer-users')->with('success', 'Successfully Updated!');
        }
        return redirect()->back()->with('success', 'Successfully Updated!');
    }
    // user certificate




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $user = User::find($id);
        if (isset($request->status)) {
            $user->status = 1;
            $user->save();

            $to = $user->email;
            Mail::to($to)->queue(new AccountStatus($user));

            return redirect()->back()->with('success', 'Successfully Active User!');
        } else {
            $user->status = 0;
            $user->save();
            $to = $user->email;
            Mail::to($to)->queue(new AccountStatus($user));
            return redirect()->back()->with('success', 'Successfully Deactive User!');
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->email = 'del_' . $id . '_' . $user->email;
        $user->save();
        /*if($user->role_id==3){
            if($user->employer_info){
                $user->employer_info->delete();
            }
        }*/
        $user->delete();
        if ($user->info) {
            $user->info->delete();
        }
        if ($user->interview) {
            $user->interview->delete();
        }

        return redirect()->back()->with('success', 'Successfully Deleted User!');
    }
}
