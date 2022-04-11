<?php

namespace App\Http\Controllers\admin;

use App\UserWork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobApplicantModel;
use App\Work;

class JobCircularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobapplicant = JobApplicantModel::with('job')->paginate(15);
        return view('admin.jobcircular.index', compact('jobapplicant'));
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
        $works = Work::get();
        $jobapplicant = JobApplicantModel::with('job')->where('id', $id)->first();
        return view('admin.jobcircular.edit', compact('jobapplicant', 'works'));
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
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|string',
            'phone' => 'nullable|string',
            'full_address' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'application_for' => 'nullable|string',
            // 'attachment' => 'required|mimes:doc,docx,pdf,text,txt|max:2048',
        ]);

        $applicant_data = JobApplicantModel::findOrFail($id);
        $applicant_data->name = $request->name;
        $applicant_data->email = $request->email;
        $applicant_data->phone = $request->phone;
        $applicant_data->full_address = $request->full_address;
        $applicant_data->state = $request->state;
        $applicant_data->city = $request->city;
        $applicant_data->application_for = $request->application_for;
        $applicant_data->save();

        return redirect()->route('job-applicant.index')->with('success !', 'Application update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobapplicant = JobApplicantModel::destroy($id);
        return redirect()->back();
    }
}
