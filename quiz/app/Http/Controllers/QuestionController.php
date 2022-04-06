<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question_1(){
        return view('question_1');
    }

    // public function form(Request $request){
    //     if($request->has('Answers')){
    //         $num = $request->input('Answers');
    //         return redirect('question_2')->withInput();
    //     }
    //     else{
    //         return 'loh';
    //     }
    // }

    // public function r(Request $request){
    //     return $request->input('Answers');
    // }

    public function question_2(){
        return view('question_2');
    }

    public function question_3(){
        return view('question_3');
    }

    public function question_4(){
        return view('question_4');
    }

    public function question_5(){
        return view('question_5');
    }

    public function showRes(){
        return view('showRes');
    }
}
