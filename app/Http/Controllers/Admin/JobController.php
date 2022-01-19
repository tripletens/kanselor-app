<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Applications;
use App\Models\Question;
use App\Models\Answers;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationRejected;
use App\Mail\JobApplicationAccepted;
use App\Models\AssignInterview;
use App\Models\Employer;
use App\Models\Interview;
use App\Models\Vacancy;
use PDF;

use Illuminate\Support\Facades\Validator;


// use Barryvdh\DomPDF\Facade as PDF;


class JobController extends Controller
{
    // fetch all the job applications 

    public function fetch_job_applications(){
        $fetch_all_job_applications = DB::table('applications')->join('categories', 'applications.id', '=', 'categories.id')
        ->select('applications.*', 'categories.name as category_name')->get();

        // echo dd($fetch_all_job_applications); exit();

        $data = [
            "applications" => $fetch_all_job_applications
        ];
        return view('admin.jobs.view')->with($data);
    }

    public function fetch_one_job_application($code){
        $job_application = DB::table('applications')->where("applications.code",$code)->join('categories', 'applications.id', '=', 'categories.id')
        ->select('applications.*', 'categories.name as category_name')->get();
        
        // echo dd($job_application);
        if(count($job_application) == 0){
            toastr()->error("Invalid Job Application Code Provided");
            return redirect()->route('admin.job_applications');
        }

        $answers = Answers::where("application_code",$code)->get();
        
        if(count($job_application) > 0 ){
            $category_id = $job_application[0]->category;
            $questions = Question::where('category_id',$category_id)->where('status','1')->get();
        };

        $employers = Employer::all();

        $vacancies = DB::table('vacancies')->join('employers','vacancies.employer_id','=','employers.id')
                    ->select('vacancies.*','employers.id as employer_id','employers.name as employer_name','employers.email as employer_email')->get();
        
        $interviews = Interview::where('application_code',$code)->where('status','1')->get();

        $data = [
            'job_application' => $job_application,
            'questions' => $questions,
            'answers' => $answers,
            'employers' => $employers,
            'vacancies' => $vacancies,
            'interviews' => $interviews ? $interviews : []
        ];

        return view('admin.jobs.view-one')->with($data);
    }

    public function approve($id){
        if(!isset($id)){
            toastr()->error('Invalid Format for approving record!');
            return back();
        }

        $job_application = Applications::where('id',$id)->where('status','2')->orWhere('status','0')->get(); 
        // pending = 2 ; approved = 1; rejected = 0

        // dd($job_application);
        if(!$job_application || count($job_application) == 0){
            toastr()->error('Sorry the approved has already been deleted or doesnt exist');
            return back();
        }

        $approve_job_application = $job_application[0]->update([
            'status' => '1'
        ]);

        if(!$approve_job_application){
            toastr()->error('Sorry the Job Application could not be approved, try again later');
            return back();
        }

        toastr()->success('Job Application has been approved Successfully');

        $data = [
            'email' => $job_application[0]->email,
            'name' => $job_application[0]->name,
            'post' => $job_application[0]->position,
            'code' => $job_application[0]->code,
            'date' => $job_application[0]->created_at
        ];
        
        $email = $job_application[0]->email;

        Mail::to($email)->send(new JobApplicationAccepted($data));

        toastr()->success('An E-mail has been sent to the applicant via-' . $email);
        return back();
    }

    public function reject($id){
        // dd($id);
        if(!isset($id)){
            toastr()->error('Invalid Format for rejecting record!');
            return back();
        }

        $job_application = Applications::where('id',$id)->where('status','2')->orWhere('status','1')->get(); 
        // pending = 2 ; approved = 1; rejected = 0

        // dd($job_application[0]->email);
        if(!$job_application || count($job_application) == 0){
            toastr()->error('Sorry the approved has already been rejected or doesnt exist');
            return back();
        }

        $reject_job_application = $job_application[0]->update([
            'status' => '0'
        ]);

        if(!$reject_job_application){
            toastr()->error('Sorry the Job Application could not be rejedted, try again later');
            return back();
        }

        toastr()->success('Job Application has been rejected Successfully');
        // send an email to the user that the job application has been rejected 

        $email = $job_application[0]->email;
        $data = [
            'email' => $job_application[0]->email,
            'name' => $job_application[0]->name,
            'post' =>$job_application[0]->position,
            'date' => $job_application[0]->created_at
        ];

        Mail::to($email)->send(new JobApplicationRejected($data));

        toastr()->success('An E-mail has been sent to the applicant via-' . $email);

        return back();
    }

    public function fetch_job_applicants(){
        $fetch_job_applicants = User::orderby('id','DESC')->get();

        if(!$fetch_job_applicants){
            toastr()->error('Sorry we could not fetch the job applicants.');
            return back();
        }

        $data = [
            'job_applicants' => $fetch_job_applicants
        ];

        return view('admin.job_applicants.view')->with($data);
    }

    public function fetch_job_applicants_by_id($id){
        $check_job_applicant = User::find($id);

        if(!$check_job_applicant){
            toastr()->error('Sorry Job Applicant record not found');
            return back();
        }

        $data = [
            'job_applicant' => $check_job_applicant
        ];

        // dd($check_job_applicant->name);
        return view('admin.job_applicants.view-one')->with($data);
    }

    public function deactivate_user(Request $request){

        $user_id = $request->input('user_id');

        $user = User::find($user_id);

        if(!$user){
            toastr()->error('Sorry Job Applicant record not found');
            return back();
        }

        $deactivate_user = $user->update(['status' => '0']);

        if(!$deactivate_user){
            toastr()->error('Sorry Job Applicant record could not be deactivated');
            return back();
        }

        toastr()->success('Job applicant deactivated successfully');
        return back();
    }

    public function activate_user(Request $request){

        $user_id = $request->input('user_id');

        $user = User::find($user_id);

        if(!$user){
            toastr()->error('Sorry Job Applicant record not found');
            return back();
        }

        $deactivate_user = $user->update(['status' => '1']);

        if(!$deactivate_user){
            toastr()->error('Sorry Job Applicant record could not be activated');
            return back();
        }

        toastr()->success('Job applicant activated successfully');
        return back();
    }

    public function generate_pdf_application($code){
        $job_application = DB::table('applications')->where("applications.code",$code)->join('categories', 'applications.id', '=', 'categories.id')
        ->select('applications.*', 'categories.name as category_name')->get();

        if(count($job_application) == 0){
            toastr()->error("Invalid Job Application Code Provided");
            return redirect()->route('admin.job_applications');
        }

        // dd($job_application);

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();

        $pdf = PDF::loadView('admin.pdf.job_application',compact('job_application'));
        return $pdf->download( 'Kiyix-' . $code . '.pdf');
    }

    public function assign_interview(Request $request){
        // 'user_id', 'application_code', 'interview_code', 'interview_id', 'employer_id',
        $validator = Validator::make($request->all(), [
            "user_id" => 'required',
            "application_code" => 'required',
            "interview_id" => 'required',
            'vacancy_id' => 'required'
        ]);
    
        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }

        $user_id = $request->input('user_id');

        $application_code = $request->input('application_code');

        $interview_id = $request->input('interview_id');

        $vacancy_id = $request->input('vacancy_id');

        $fetch_vacancy_details = Vacancy::find($vacancy_id);

        // print_r($vacancy_id); exit();

        $employer_id = $fetch_vacancy_details['employer_id'];

        $check_assigned_interview = AssignInterview::where('user_id',$user_id)->where('vacancy_id',$vacancy_id)->where('interview_id',$interview_id)->get();

        if(count($check_assigned_interview) > 0 ){
            toastr()->error('Sorry Job Applicant has already been assigned this interview');
            return back();
        }else{
            $save_assigned_interview = AssignInterview::create([
                'user_id' => $user_id, 
                'application_code' => $application_code,
                'interview_id' => $interview_id, 
                'vacancy_id' => $vacancy_id, 
                'employer_id' => $employer_id,  
            ]);
            
            if (!$save_assigned_interview) {
                toastr()->error('Sorry we could not assign the Vacancy & interview to the Job seeker');
                return back();
            }
    
            toastr()->success('Interview for Vacancy Assigned to the Job Seeker Successfully');
            return back();
        }
    }
}
