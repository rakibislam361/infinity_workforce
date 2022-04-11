<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interview;
use App\Role;
use App\User;
use App\Work;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data_startdate = request('start_date', '');
        $data_enddate = request('end_date', '');
        $data_name = request('name', '');
        $data_email = request('email', '');
        $data_suburb = request('suburb', '');
        $data_job = request('job', '');
        $data_id = request('idn', '');
        $data_phone = request('phone', '');

        $candidates = Interview::with('info', 'user');

        if (!empty($data_startdate) & !empty($data_enddate)) {
            $candidates = $candidates->whereBetween('created_at', [$data_startdate, $data_enddate]);
        }

        if (!empty($data_name)) {
            $candidates = $candidates->info->where('first_name', 'LIKE', '%' . $data_name . '%');
        }

        // if (!empty($data_email)) {
        //     $candidates = $candidates->where('email', 'LIKE', '%' . $data_email . '%');
        // }


        if (!empty($data_job)) {
            $candidates = $candidates->where('position_interested', $data_job);
        }

        if (!empty($data_id)) {
            $candidates = $candidates->where('id', $data_id);
        }

        if ($data_phone) {
            $candidates = $candidates->where('phone', $data_phone);
        }

        $candidates = $candidates->orderby('id', 'desc')->paginate(20);
        $work = Work::get(['title', 'id']);
        $interviews = Interview::with('user', 'info')->get();
        return view('admin.interview.index', compact('interviews', 'candidates', 'work'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.interview.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Interview;
        $data->user_id = $request->user_id;
        $data->found_us = $request->found_us;
        $data->car = $request->car;
        $data->lives_in = $request->lives_in;
        $data->lk = $request->lk;
        $data->present = $request->present;
        $data->arrived_in_aus = $request->arrived_in_aus;
        $data->speaks = $request->speaks;
        $data->computer_skill = $request->computer_skill;
        $data->communication = $request->communication;
        $data->special_skills = $request->special_skills;
        $data->current_work = $request->current_work;
        $data->qualification = $request->qualification;
        $data->expected_rate = $request->expected_rate;
        $data->position_interested = $request->position_interested;
        $data->special_requirements = $request->special_requirements;
        $data->save();
        return redirect()->back()->with('success', 'Successfully Taken Interview!');
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
