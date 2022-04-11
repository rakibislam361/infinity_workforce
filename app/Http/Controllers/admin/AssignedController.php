<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssignedCandidate;
use App\User;
use App\EmployerInfo;

class AssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_name = '';
        $data_email = '';
        $data_suburb = '';
        $data_visa = '';
        $data_id = '';


        $candidates = User::where('role_id', 2)->where('status', 1)->orderBy('created_at', 'DESC')->paginate(50);

        $employers = EmployerInfo::where('status', 1)->orderBy('company_name', 'ASC')->get();
        return view('admin.employer.assigned_candidates', compact('candidates', 'employers', 'data_visa', 'data_name', 'data_email', 'data_suburb', 'data_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function candidate_search(Request $request)
    {
        $data_id = request('can_id', '');
        $$data_job = request('work_id', '');
        $data_name = request('name', '');
        $data_email = request('email', '');
        $data_suburb = request('suburb', '');
        $data_visa = request('visa', '');
        $candidates = User::with(['info'])->where('role_id', 2)->where('status', 1);

        if ($data_id) {
            $query = $candidates->where('id', $data_id);
        }

        if (!empty($data_name)) {
            $candidates = $candidates->whereHas('info', function ($query) use ($data_name) {
                $query = $query->where('first_name', 'LIKE', '%' . $data_name . '%');
            });
        }

        if ($data_email) {
            $candidates = $candidates->where('email', 'LIKE', '%' . $data_email . '%');
        }

        if ($data_suburb) {
            $candidates = $candidates->whereHas('info', function ($query) use ($data_suburb) {
                $query = $query->where('postcode', $data_suburb);
            });
        }

        if ($data_visa > 0) {
            $candidates = $candidates->whereHas('info', function ($query) use ($data_visa) {
                $query = $query->where('visa', $data_visa);
            });
        }

        $candidates = $candidates->orderBy('id', 'desc')->paginate(50);
        $employers = EmployerInfo::orderBy('company_name', 'ASC')->paginate(50);
        return view('admin.employer.assigned_candidates', compact('candidates', 'employers', 'data_name', 'data_visa', 'data_email', 'data_suburb', 'data_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function employee_assign(Request $request)
    {
        // $data = AssignedCandidate::where('employer_id',$request->employer)->where('user_id'); 
        if (!empty($request->assigned)) {

            foreach ($request->assigned as $value) {

                $data = new AssignedCandidate;
                $data->employer_id = $request->employer;
                $data->user_id = $value;
                $data->status = 1;
                $assigned_user = AssignedCandidate::where('employer_id', $request->employer)->where('user_id', $value)->first();
                if ($assigned_user) {
                } else {

                    $data->save();
                }
            }
            return redirect()->back()->with('success', 'Successfully Assigned Candidate!');
        } else {
            return redirect()->back()->with('error', 'Please select at least one candidate');
        }
    }
    public function store(Request $request)
    {
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
        $user = AssignedCandidate::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Successfully Deleted User!');
    }
    public function user_destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('success', 'Successfully deleted user!');
    }
}
