<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applications;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Interview;
use App\Models\Question;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index(){
        // pending applications
        // accepted_applications
        // denied_applications

        $pending_applications = Applications::where('status','2')->count();
        $accepted_applications = Applications::where('status','1')->count();
        $rejected_applications = Applications::where('status','0')->count();
        $all_interviews = Interview::count();
        $all_categories = Category::count();
        $all_questions = Question::count();
        $all_users = User::count();
        $all_employers = Employer::count();
        $data = [
            'dashboard' => [
                'pending_applications' => $pending_applications,
                'accepted_applications' => $accepted_applications,
                'rejected_applications' => $rejected_applications,
                'all_interviews' => $all_interviews,
                'all_categories' => $all_categories,
                'all_questions' => $all_questions,
                'all_users' => $all_users,
                'all_employers' => $all_employers
            ]
        ];

        // dd($data);
        return view('admin.home')->with($data);
    }
}
