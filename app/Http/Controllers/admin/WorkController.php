<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;
use App\UserWork;
use App\WorkingCategory;
use softDeletes;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::orderBy('title')->paginate(20);

        return view('admin.work.index', compact('works'));
    }
    public function user_wish_to_work_update(Request $request)
    {
        $id = $request->user_id;
        $work = UserWork::where('user_id', $id);
        $work->delete();
        if (isset($request->work)) {
            foreach ($request->work as $work) {
                $user_work = new UserWork;
                $user_work->work_id = $work;
                $user_work->user_id = $id;
                $user_work->save();
            }
        }

        return redirect()->back()->with('success', 'Successfully Updated!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = WorkingCategory::where('status', 1)->get();
        return view('admin.work.create', compact('categories'));
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
            "title" => "required",
            "category" => "required",
        ]);

        $job_image = "";
        if ($request->hasFile('thumbnail')) {
            $thumbnail = time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->thumbnail->move(public_path('images/jobs'), $thumbnail);
            $job_image = $thumbnail;
        }


        $work = new Work;
        $work->title = $request->title;
        $work->slug = str_slug($request->title);
        $work->category_id = $request->category;
        $work->thumbnail = $job_image;
        $work->desc = $request->desc;

        if (isset($request->status)) {
            $work->status = 1;
        } else {
            $work->status = 0;
        }

        $work->save();
        return redirect()->route('admin-work')->with('success', 'Successfully Created Work!');
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
        $categories = WorkingCategory::where('status', 1)->get();
        $work = Work::find($id);
        return view('admin.work.edit', compact('categories', 'work'));
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
            "title" => "required",
            "category" => "required",

        ]);
        $work = Work::find($id);
        $work->title = $request->title;
        $work->category_id = $request->category;
        $work->desc = $request->desc;

        if (isset($request->status)) {
            $work->status = 1;
        } else {
            $work->status = 0;
        }

        $work->save();
        return redirect()->route('admin-work')->with('success', 'Successfully Updated Work!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $work = Work::find($id);
        if (isset($request->status)) {
            $work->status = 1;
            $work->save();
            return redirect()->back()->with('success', 'Successfully Published Work!');
        } else {
            $work->status = 0;
            $work->save();
            return redirect()->back()->with('success', 'Successfully Unpublished Work!');
        }
    }
    public function destroy($id)
    {
        $work = Work::find($id);
        $work->delete();
        //$work->category->detach();
        return redirect()->back()->with('success', 'Successfully Deleted Work!');
    }
}
