<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserDocument;
use App\User;
use Auth;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();

        return view('user.document.index',compact('user'));
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
        
         $this->validate(request(),[
             "image" => "mimes:jpeg,bmp,png,jpg|max:2048",
             "visa" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:2048",
             "resume" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:2048",
             "police_clearance" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:2048",
             "medical_certificate" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:2048",
             "d_license" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:2048",            
             "insurance" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:2048",            
             "qualifications" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:2048",            
             "others" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:2048",            
            ]); 
       //return $request;
        //1=image,2=visa,3=resume,4=clearance,5=medical_certificate,6=d_license,7=passport,8=other  
        //image
        if($request->doc_image !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/images');
            $file = $request->doc_image;
            $ext = $request->doc_image->getClientOriginalExtension();
            $fileName = 'Image_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 1;
            $document->file = $fileName;
            $document->save();
        }
        //visa
        if($request->visa_copy !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/visa');
            $file = $request->visa_copy;
            $ext = $request->visa_copy->getClientOriginalExtension();
            $fileName = 'Visa_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
             $document->type = 2;
            $document->file = $fileName;
            $document->save();
        }
        //resume
        if($request->resume !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/resumes');
            $file = $request->resume;
            $ext = $request->resume->getClientOriginalExtension();
            $fileName = 'Resume_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 3;
            $document->file = $fileName;
            $document->save();
        }
        //clearance
        if($request->police_clearance !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/police-clearance');
            $file = $request->police_clearance;
            $ext = $request->police_clearance->getClientOriginalExtension();
            $fileName = 'Police_Clearance_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 4;
            $document->file = $fileName;
            $document->save();
        }
        //medical_certificate
        if($request->medical_certificate !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/medical-certificate');
            $file = $request->medical_certificate;
            $ext = $request->medical_certificate->getClientOriginalExtension();
            $fileName = 'Medical_Certificate_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type =5;
            $document->file = $fileName;
            $document->save();
        }
        //d_license
        if($request->d_license !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/d-license');
            $file = $request->d_license;
            $ext = $request->d_license->getClientOriginalExtension();
            $fileName = 'Photo_ID_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
             $document->type = 6;
            $document->file = $fileName;
            $document->save();
        }
         //insurance
        if($request->insurance !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/insurance');
            $file = $request->insurance;
            $ext = $request->insurance->getClientOriginalExtension();
            $fileName = 'Insurance_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 7;
            $document->file = $fileName;
            $document->save();
        }
       
        //qualifications
        if($request->qualifications !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/qualifications');
            $file = $request->qualifications;
            $ext = $request->qualifications->getClientOriginalExtension();
            $fileName = 'Qualifications_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 8;
            $document->file = $fileName;
            $document->save();
        }
        //others
        if($request->others !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/others');
            $file = $request->others;
            $ext = $request->others->getClientOriginalExtension();
            $fileName = 'Others_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 9;
            $document->file = $fileName;
            $document->save();
        }
       
       return redirect()->route('user-profile')->with('success','Successfully Upload Documents!')->with('active',4);
      //  return redirect(route('my-available-to-work'))->with('success','Sucessfully Updated Document !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function document_store(Request $request)
    {
        
         $this->validate(request(),[
             "image" => "mimes:jpeg,bmp,png,jpg|max:5120",
             "visa" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:5120",
             "resume" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:5120",
             "police_clearance" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:5120",
             "medical_certificate" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:5120",
             "d_license" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:5120",
             "insurance" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:5120",            
             "qualifications" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:5120",            
             "others" => "mimes:doc,docx,pdf,jpeg,bmp,png,jpg|max:5120",         
            ]); 
       //return $request;
        //1=image,2=visa,3=resume,4=clearance,5=medical_certificate,6=d_license,7=passport,8=other  
        //image
        if($request->doc_image !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/images');
            $file = $request->doc_image;
            $ext = $request->doc_image->getClientOriginalExtension();
            $fileName = 'Image_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 1;
            $document->file = $fileName;
            $document->save();
        }
        //visa
        if($request->visa_copy !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/visa');
            $file = $request->visa_copy;
            $ext = $request->visa_copy->getClientOriginalExtension();
            $fileName = 'Visa_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
             $document->type = 2;
            $document->file = $fileName;
            $document->save();
        }
        //resume
        if($request->resume !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/resumes');
            $file = $request->resume;
            $ext = $request->resume->getClientOriginalExtension();
            $fileName = 'Resume_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 3;
            $document->file = $fileName;
            $document->save();
        }
        //clearance
        if($request->police_clearance !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/police-clearance');
            $file = $request->police_clearance;
            $ext = $request->police_clearance->getClientOriginalExtension();
            $fileName = 'Police_Clearance_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 4;
            $document->file = $fileName;
            $document->save();
        }
        //medical_certificate
        if($request->medical_certificate !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/medical-certificate');
            $file = $request->medical_certificate;
            $ext = $request->medical_certificate->getClientOriginalExtension();
            $fileName = 'Medical_Certificate_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type =5;
            $document->file = $fileName;
            $document->save();
        }
        //d_license
        if($request->d_license !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/d-license');
            $file = $request->d_license;
            $ext = $request->d_license->getClientOriginalExtension();
            $fileName = 'Photo_ID_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
             $document->type = 6;
            $document->file = $fileName;
            $document->save();
        }
         //insurance
        if($request->insurance !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/insurance');
            $file = $request->insurance;
            $ext = $request->insurance->getClientOriginalExtension();
            $fileName = 'Insurance_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 7;
            $document->file = $fileName;
            $document->save();
        }
       
        //qualifications
        if($request->qualifications !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/qualifications');
            $file = $request->qualifications;
            $ext = $request->qualifications->getClientOriginalExtension();
            $fileName = 'Qualifications_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 8;
            $document->file = $fileName;
            $document->save();
        }
        //others
        if($request->others !=''){
            $document=new UserDocument;
            $document->user_id=$request->user_id;
            $destinationPath =   public_path('/images/user-documents/others');
            $file = $request->others;
            $ext = $request->others->getClientOriginalExtension();
            $fileName = 'Others_'.date('Y_m_d_H_i').'_'.rand(100,10000).'.'.$ext;
            if(file_exists($destinationPath.'/'.$fileName)){
                @unlink($destinationPath.'/'.$fileName);
            }
            $file->move($destinationPath, $fileName);
            $document->type = 9;
            $document->file = $fileName;
            $document->save();
        }
          return redirect()->route('user-profile')->with('success','Successfully Upload Documents!')->with('active',4);
        //return redirect(route('my-available-to-work'))->with('success','Sucessfully Updated Document !');

    }

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
    public function destroy(Request $request,$id)
    {
      
       $doc=UserDocument::find($id);

       if($request->type==1){
            $folder=public_path('/images/user-documents/images/');
            $file= $doc->file;
            $file= $folder.''.$file;
            unlink($file);
       }
       if($request->type==2){
            $folder=public_path('/images/user-documents/visa/');
            $file= $doc->file;
            $file= $folder.''.$file;
            unlink($file);
       }
       if($request->type==3){
            $folder=public_path('/images/user-documents/resumes/');
            $file= $doc->file;
            $file= $folder.''.$file;
            unlink($file);
       }
        if($request->type==4){
            $folder=public_path('/images/user-documents/police-clearance/');
            $file= $doc->file;
            $file= $folder.''.$file;
            unlink($file);
       }
       if($request->type==5){
            $folder=public_path('/images/user-documents/medical-certificate/');
            $file= $doc->file;
            $file= $folder.''.$file;
            unlink($file);
       }
       if($request->type==6){
            $folder=public_path('/images/user-documents/d-license/');
            $file= $doc->file;
            $file= $folder.''.$file;
            unlink($file);
       }
       
       $doc->delete();
        return redirect()->route('user-profile')->with('success','Sucessfully Deleted Doc !')->with('active',3); 
       //return back()->with('success','Sucessfully Deleted Doc !');
    }
}
