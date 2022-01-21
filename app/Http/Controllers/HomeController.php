<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Applications;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // pending_applications
        // active_applications 
        // rejected_applications
        $user_id = Auth('web')->user()->id;
        $pending_applications = Applications::where('user_id',$user_id)->where('status','2')->count();
        $accepted_applications = Applications::where('user_id',$user_id)->where('status','1')->count();
        $rejected_applications = Applications::where('user_id',$user_id)->where('status','0')->count();

        // $all_interviews = Interview::where('user_id',$user_id)->count();

        $all_interviews = DB::table('assign_interviews')
        ->join('interviews','interviews.application_code','=','assign_interviews.application_code')
        ->select('interviews.*')->count();

        $data = [
            'dashboard' => [
                'pending_applications' => $pending_applications,
                'accepted_applications' => $accepted_applications,
                'rejected_applications' => $rejected_applications,
                'all_interviews' => $all_interviews,
            ]
        ];
        return view('home')->with($data);    
    }
}
