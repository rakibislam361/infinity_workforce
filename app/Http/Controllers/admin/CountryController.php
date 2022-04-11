<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class CountryController extends Controller
{

    public function index(){
    	$countries=Country::orderBy('name','ASC')->get();
    	return view('admin.country.index', compact('countries'));
    }

    public function status(Request $request,$id){
        $country=Country::find($id);
        if(isset($request->status)){
            $country->status=1;
            $country->save();
            return redirect()->back()->with('success','Successfully Active Country!');
        }
        else{
             $country->status=0;
             $country->save();
             return redirect()->back()->with('success','Successfully Deactive Country!');
        }
    }

}
