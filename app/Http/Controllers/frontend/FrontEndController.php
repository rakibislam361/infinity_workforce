<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobApplicantModel;
use App\Page;
use App\Slider;
use App\Widget;
use App\Social;
use App\Service;
use App\Message;
use App\Work;
use App\User;
use App\UserWork;
use Session;
use Auth;
use Mail;
use App\Mail\ContactMail;
//mail
//use Illuminate\Support\Facades\Mail;

use App\Mail\SendMailable;


use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Image;
use Illuminate\Support\Facades\Redirect;



class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();
        $slides = Slider::where('status', 1)->orderBy('sl', 'ASC')->orderBy('created_at', 'DESC')->get();
        $content = Page::where('id', 1)->first();
        $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get();


        return view('frontend.home', compact('slides', 'content', 'widgets', 'socials', 'services'));
    }
    public function service()
    {
        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();

        $content = Page::where('id', 5)->first();
        $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->paginate(20);

        return view('frontend.services', compact('content', 'widgets', 'socials', 'services'));
    }



    public function service_view($slug)
    {
        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();

        $content = Page::where('id', 5)->first();
        $service = Service::where('slug', $slug)->first();
        return view('frontend.service_single', compact('content', 'widgets', 'socials', 'service'));
    }
    public function about()
    {
        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();
        $content = Page::where('id', 2)->first();
        return view('frontend.about', compact('content', 'widgets', 'socials'));
    }

    public function contact_us()
    {
        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();
        $content = Page::where('id', 6)->first();
        return view('frontend.contact_us', compact('content', 'widgets', 'socials'));
    }
    public function job_listing()
    {
        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();
        $content = Page::where('id', 7)->first();
        $jobs = Work::where('status', 1)->orderBy('created_at', 'DESC')->paginate(20);
        return view('frontend.job_list', compact('content', 'widgets', 'socials', 'jobs'));
    }
    public function employer()
    {
        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();
        $content = Page::where('id', 4)->first();
        return view('frontend.employers', compact('content', 'widgets', 'socials'));
    }
    public function job_single($slug)
    {
        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();
        $content = Page::where('id', 7)->first();
        $job = Work::where('slug', $slug)->first();
        return view('frontend.job_single', compact('content', 'widgets', 'socials', 'job'));
    }

    public function mail(Request $request)
    {
        $mail = new Message;
        $mail->name = $request->name;
        $mail->email = $request->email;
        $mail->phone = $request->phone;
        $mail->subject = $request->subject;
        $mail->message = $request->message;

        $mail->save();

        //mail
        $objDemo = new \stdClass();

        $admin = User::where('role_id', 1)->where('status', 1)->get();
        $admin = json_decode($admin);
        Mail::to('info@infinityworkforce.com.au')->send(new ContactMail($mail));


        return redirect()->back()->with('success', 'Sucessfully Sent Your Email!');
    }
    // user account block
    public function user_account_block()
    {
        if (Auth::check()) {
            return redirect()->route('frontend-home');
        } else {
            $widgets = Widget::where('status', 1)->get();
            $socials = Social::where('status', 1)->get();

            return view('frontend.account_block', compact('widgets', 'socials'));
        }
    }

    public function apply_job(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'nullable|string',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            // 'attachment' => 'required|mimes:doc,docx,pdf,text,txt|max:2048',
        ]);

        $unique_number = 'AP' . str_pad(rand(6, 0), "0", STR_PAD_LEFT);
        $attachment_cv = '';

        if ($request->hasFile('file')) {
            $attachment = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('images/cv'), $attachment);
            $attachment_cv = $attachment;
        }

        $find = JobApplicantModel::where('name', $request->name)
            ->where('email', $request->email)
            ->get();

        $applicant_data = new JobApplicantModel;
        $applicant_data->name = $request->name;
        $applicant_data->email = $request->email;
        $applicant_data->phone = $request->phone;
        $applicant_data->gender = $request->gender;
        $applicant_data->full_address = $request->address;
        $applicant_data->application_for = $id;
        $applicant_data->applicant_id = $unique_number;
        $applicant_data->attachment = $attachment_cv;
        $applicant_data->save();

        $notification = array(
            'message' => 'Job application send successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification)->with('active', 5);
        // if ($find) {
        //     return redirect()->route('user-profile')->with('success', 'You have already applied for this job')->with('active', 5);
        // } else {
        //     JobApplicantModel::create($data);
        //     return redirect()->route('user-profile')->with('success', 'Sucessfully applied')->with('active', 5);
        // }
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
