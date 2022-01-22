<?php

namespace App\Http\Controllers;

use App\Models\ApplyTrainings;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Trainings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactMail;

class LandingController extends Controller
{
    // landing page
    public function index()
    {
        //
        $featured_jobs = Jobs::orderBy('id','desc')->limit(3)->get();
        $data = [
            'jobs' => $featured_jobs
        ];
        // dd($featured_jobs);
        return view('index')->with($data);
    }

    public function about()
    {
        //
        return view('about');
    }

    public function contact()
    {
        //
        $random_code = Str::random(8);

        $data = [
            'code' => $random_code
        ];

        return view('contact')->with($data);
    }

    public function team()
    {
        //
        return view('team');
    }

    public function jobs()
    {
        //
        return view('jobs');
    }
    
    public function blog()
    {
        //
        return view('blog');
    }

    public function testimonials()
    {
        //
        return view('testimonials');
    }
    public function terms()
    {
        //
        return view('terms');
    }

    public function trainings()
    {
        // fetch all the trainings 

        $trainings = Trainings::orderby('id','desc')->paginate(10);
        $data = [
            'trainings' => $trainings
        ];
        return view('trainings')->with($data);
    }

    public function trainings_one($slug){
        $training = Trainings::where("slug", $slug)->first();

        $data = [
            'training' => $training
        ];
        return view('trainings_one')->with($data);
    }

    public function apply_training(Request $request){
       
        $validator = Validator::make($request->all(), [
            "phone" => 'required|max:255',
            "fullname" => 'required|max:255',
            "email" => 'required|max:255',
            "address" => 'required|max:255',
        ]);
        
        // `training_id`, `fullname`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`

        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }else{
            // check if some one has registered with that email before 
                $training_id = $request->input('training_id');
                $fullname = $request->input('fullname');
                $email = $request->input('email');
                $phone = $request->input('phone');
                $address = $request->input('address');
                
                $check_application = ApplyTrainings::where('training_id',$training_id)->where('email',$email)->get();

                if($check_application && count($check_application) > 0){
                    // toastr()->error('');
                    return back()->with('error','Sorry this email has already applied for this training');
                }

                $create_training = ApplyTrainings::create([
                    'training_id' => $training_id,
                    'fullname' => $fullname,
                    'email' => $email,
                    'phone' =>  $phone,
                    'address' =>  $address
                ]);

                if(!$create_training){
                    // toastr()->error('');
                    return back()->with('error','Sorry we could not save the training. Try again later');
                }

                // toastr()->success('');
                return back()->with('success','Your Application to the training is Successful');
        }
    }

    public function send_contact_mail(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => 'required|max:255',
            "email" => 'required|max:255',
            "subject" => 'required',
            "message" => 'required|max:255',
            "code" => 'required|max:255',
        ]);
        
        // `training_id`, `fullname`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`

        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }else{
            $name = $request->input('name');
            $email = $request->input('email');
            $subject = $request->input('subject');
            $user_message = $request->input('message');
            $code = $request->input('code');
            $real_code = $request->input('real_code');

            if($real_code != $code){
                toastr()->error('All Fields are Required');
                return back()->with('error','Sorry! Invalid Code');
            }
            
            $data = [
                'email' => $email,
                'name' => $name,
                'subject' => $subject,
                'user_message' => $user_message
            ];

            $send_mail = Mail::to('ifeanyi.kanselor@gmail.com')->send(new SendContactMail($data));

            // Mail::send('email_view', $data, function ($m) use ($user) {
            //     $m->from("example@gmail.com", config('app.name', 'APP Name'));
            //     $m->to($user->email, $user->email)->subject('Email Subject!');
            // }); ->subject($subject)
            
            return back()->with('success','Thanks for reaching out to us. We contact you within the next 24 hours.');
        }
    }
}
