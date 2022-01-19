<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;

use App\Models\AssignInterview;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    //
    public function fetch_all_interviews(){
        $user_id = Auth::guard('web')->user()->id;
        // $all_interviews = AssignInterview::where('user_id',$user_id)->get();
        
        // dd($all_interviews);

        // `user_id`, `application_code`, `interview_code`, `interview_id`, `vacancy_id`, `employer_id`, 

        $all_interviews = DB::table('assign_interviews')->join('interviews','interviews.id','=','assign_interviews.interview_id')
        ->select('interviews.*')->get();

        $data = [ 
            'interviews' => $all_interviews
        ];
        return view('dashboard.interviews.view')->with($data);
    }
    // public function 
}
