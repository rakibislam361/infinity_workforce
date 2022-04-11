<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Category;
use App\Topic;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('name','ASC')->paginate(20);
        return view('admin.quiz.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories=Category::where('status',1)->get();
       $topics=Topic::where('status',1)->get();
       return view('admin.quiz.create',compact('categories','topics'));
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
            'question' => 'required',             
            'option_1' => 'required',             
            'option_2' => 'required',             
            'option_3' => 'required',             
            'option_4' => 'required',             
            'category' => 'required',             
            'correct' => 'required',             
            ]);
        $question=new Question;
        $question->question=$request->question;
        $question->option_1=$request->option_1;
        $question->option_2=$request->option_2;
        $question->option_3=$request->option_3;
        $question->option_4=$request->option_4;
        $question->right_ans=$request->correct;
        $question->category_id=$request->category;
        $question->topic_id=$request->topic;

        if(isset($request->status)){
            $question->status=1;
        }
        else{
             $question->status=0;
        }

        $question->save();
        return redirect()->back()->with('success','Successfully Created Quiz!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions=Question::where('category_id',$id)->get();
        $category=Category::find($id);
        return view('admin.quiz.show',compact('questions','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz=Question::find($id);
        $categories=Category::where('status',1)->get();
        $topics=Topic::where('status',1)->get();
        return view('admin.quiz.edit',compact('quiz','categories','topics'));
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
        $this->validate(request(),[
            'question' => 'required',             
            'option_1' => 'required',             
            'option_2' => 'required',             
            'option_3' => 'required',             
            'option_4' => 'required',             
            'category' => 'required',             
            'correct' => 'required',             
            ]);
        $question=Question::find($id);
        $question->question=$request->question;
        $question->option_1=$request->option_1;
        $question->option_2=$request->option_2;
        $question->option_3=$request->option_3;
        $question->option_4=$request->option_4;
        $question->right_ans=$request->correct;
        $question->category_id=$request->category;
        if(isset( $question->topic_id)){
            $question->topic_id=$request->topic;
        }
       

        if(isset($request->status)){
            $question->status=1;
        }
        else{
             $question->status=0;
        }

        $question->save();
        return redirect()->route('admin-quiz')->with('success','Successfully Updated Quiz!');
    }
    public function status(Request $request,$id){
        $category=Category::find($id);
        if(isset($request->status)){
            $category->status=1;
            $category->save();
            return redirect()->back()->with('success','Successfully Active Category!');
        }
        else{
             $category->status=0;
             $category->save();
             return redirect()->back()->with('success','Successfully Deactive Category!');
        }
  

    }
    public function quiz_status(Request $request,$id){
        $quiz=Question::find($id);
        if(isset($request->status)){
            $quiz->status=1;
            $quiz->save();
            return redirect()->back()->with('success','Successfully Published Question!');
        }
        else{
             $quiz->status=0;
             $quiz->save();
             return redirect()->back()->with('success','Successfully  Unpublished Question!');
        }
  

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
