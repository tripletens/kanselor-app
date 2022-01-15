<?php

namespace App\Http\Controllers;

use App\Models\ApplyTrainings;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Trainings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        return view('contact');
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
}
