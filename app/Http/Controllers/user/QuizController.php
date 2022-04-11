<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;
use App\UserQuizResult;
use Auth;
use PDF;
use Dompdf\Dompdf;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $categories=Category::where('status',1)->orderBy('name')->get();
       /* $attended = UserQuizResult::where('user_id',$user->id)->select('category_id','attempted')->get();
        foreach($categories as $key=>$rowCat) {
            foreach ($attended as $rowAtt) {
               if($rowCat->id == $rowAtt->category_id && $rowAtt->attempted == 3)
               {
                     unset($categories[$key]);
               }
            }
        }*/

       //return $categories;
        return view('user.quiz.index',compact('user','categories'));
    }
    public function questions($id)
    {
        $questions=Question::where('category_id',$id)->where('status',1)->orderBy('question','ASC')->get();
        $category=Category::where('id',$id)->first();
        $total_question = Question::where('category_id',$id)->where('status',1)->orderBy('question','ASC')->count();
       
        return view('user.quiz.question',compact('questions','category','total_question'));
    }
    public function quiz_submit(Request $request)
    {
        $total_question = $request->total_question;
        $obtained =0;
        
        foreach($request->all() as $req){
            if($req=="yes"){
                ++$obtained;
            }
        }
        

    $percentage = ($obtained / $total_question) * 100;
    //echo 'Your marks '. $percentage . '%';

    // store result
    $user_id=Auth::user()->id;
    $id=$request->category_id;
    $quiz_result=UserQuizResult::where('user_id',$user_id)->where('category_id',$id)->count();

    if($quiz_result==1){
        $result=UserQuizResult::where('category_id',$id)->where('user_id',$user_id)->first();
        $result->user_id=$user_id;
        $result->category_id=$id;
        $result->marks=$percentage;
        $result->attempted = $result->attempted+1;
        $q_cat=Category::find($id);
        $pass_mark=$q_cat->pass_mark;
        
        if(!empty($pass_mark)){
            if($percentage<$pass_mark){
                $result->status=0;
            }
            else{
                $result->status=1;
            }
        }
        
        if($result->attempted <= 3)
        {
            $result->update();
            return redirect(route('user-certificate'))->with('success','Sucessfully Updated Quiz !');
        }
        else
        {
            return redirect(route('user-certificate'))->with('error','You can not attend the exam for more than 3 times !');
        }
        
    }
    else{
        $result=new UserQuizResult;
        $result->user_id=$user_id;
        $result->category_id=$id;
        $result->marks=$percentage;
        $q_cat=Category::find($id);
        $pass_mark=$q_cat->pass_mark;
        $result->attempted = 1;

        if(!empty($pass_mark)){
             if($percentage<$pass_mark){
                $result->status=0;
            }
            else{
                $result->status=1;
            }

         }
       
        $result->save();
        return redirect(route('user-certificate'))->with('success','Sucessfully Added Quiz !');
    }
   


   /*foreach ($request->all() as $key => $val) {
   print_r($key); 
 
}*/

    }
    // download pdf

    public function pdfview($id){

        $user=Auth::user()->id;

        $q_res=UserQuizResult::where('id',$id)->where('user_id',$user)->count();

        
       //$quiz= UserQuizResult::where('id',$id)->where('user_id',$user)->first();
       
        if($q_res>0){
           $data = UserQuizResult::find($id);
            $pdf = new Dompdf();
            $pdf->set_option("isPhpEnabled", true);

            $pdf=PDF::loadView('user.certificate.download_pdf', ['data' => $data]);
            $pdf->setPaper('L', 'landscape');
            return $pdf->stream('certificate.pdf');
            return view('user.certificate.download_pdf');
        }
        else{
            return  redirect(route('user-certificate'));
        }
        
   
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
    public function certificate()
    {
        $user_id=Auth::user()->id;
        $certificates=UserQuizResult::where('user_id',$user_id)->get();
        return view('user.certificate.index',compact('certificates'));
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
        $category=Category::find($id);
        return view('user.quiz.short_desc',compact('category'));
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
