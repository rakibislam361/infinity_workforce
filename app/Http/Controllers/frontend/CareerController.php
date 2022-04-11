<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Service;
use App\Social;
use App\Widget;
use App\Work;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //     $widgets = Widget::where('status', 1)->get();
        //     $socials = Social::where('status', 1)->get();

        //     $content = Page::where('id', 8)->first();
        //     $content = Page::get();

        //     $services = Service::where('status', 1)->orderBy('created_at', 'DESC')->paginate(20);

        //     return view('frontend.career', compact('content', 'widgets', 'socials', 'services'));

        $widgets = Widget::where('status', 1)->get();
        $socials = Social::where('status', 1)->get();
        $content = Page::where('id', 8)->first();
        $jobs = Work::where('status', 1)->orderBy('created_at', 'DESC')->paginate(20);
        return view('frontend.career', compact('content', 'widgets', 'socials', 'jobs'));
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
