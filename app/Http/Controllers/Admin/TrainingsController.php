<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyTrainings;
use App\Models\Trainings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TrainingsController extends Controller
{
    //
    public function create_training(Request $request){
        $validator = Validator::make($request->all(), [
            "title" => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        // `title`, `description`, `image`, `status`, `created_at`, `updated_at` 

        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }

        if ($request->file('image')->isValid()) {
            // file is valid 
            // upload the file 
            $extension = $request->file('image')->extension();
            $filename = $request->file('image')->getClientOriginalName();
            $new_filename = Str::slug($filename . date('Y-m-d')). '.' . $extension;
            $path = $request->file('image')->storeAs('images',$new_filename);
            
            if($path) {
                $title = $request->input('title');
                $description = $request->input('description');
                $create_training = Trainings::create([
                    'title' => $title,
                    'description' => $description,
                    'image' => $new_filename,
                    'slug' =>  Str::slug($title)
                ]);

                if(!$create_training){
                    toastr()->error('Sorry we could not save the training. Try again later');
                    return back();
                }

                toastr()->success('Training created Successfully');
                return back();
            }
        }
    }

    public function fetch_all_trainings(){
        $all_trainings = Trainings::orderby('id','desc')->get();

        if(!$all_trainings){
            toastr()->error('Sorry we could not fetch all the trainings');
            return back();
        }
        
        $data = [ 
            'trainings' => $all_trainings
        ];
        return view('admin.trainings.view')->with($data);
    }

    public function fetch_one_training($id){
        $fetch_training = Trainings::find($id);

        if(!$fetch_training){
            toastr()->error('Sorry Training not found or has been deactivated');
            return back();
        }

        $data = [ 
            'training' => $fetch_training
        ];
        return view('admin.trainings.view-one')->with($data);
    }

    public function deactivate_training(Request $request){

        $training_id = $request->input('training_id');

        $training = Trainings::find($training_id);

        if(!$training){
            toastr()->error('Sorry training record not found');
            return back();
        }

        $deactivate_training = $training->update(['status' => '0']);

        if(!$deactivate_training){
            toastr()->error('Sorry training record could not be deactivated');
            return back();
        }

        toastr()->success('training deactivated successfully');
        return back();
    }

    public function activate_training(Request $request){

        $training_id = $request->input('training_id');

        $training = Trainings::find($training_id);

        if(!$training){
            toastr()->error('Sorry training record not found');
            return back();
        }

        $deactivate_training = $training->update(['status' => '1']);

        if(!$deactivate_training){
            toastr()->error('Sorry training record could not be activated');
            return back();
        }

        toastr()->success('training activated successfully');
        return back();
    }

    public function edit_training(Request $request){

        
        $validator = Validator::make($request->all(), [
            'training_id' => 'required|max:255',
            "title" => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]); 

        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }

        $training_id = $request->input('training_id');
        $title = $request->input('title');
        $description = $request->input('description');
        
        $fetch_training = Trainings::find($training_id);

        if(!$fetch_training){
            toastr()->error('Sorry we could not fetch the training');
            return back();
        }

        if ($request->file('image')->isValid()) {
            // file is valid 
            // upload the file 
            $extension = $request->file('image')->extension();
            $filename = $request->file('image')->getClientOriginalName();
            $new_filename = Str::slug($filename . date('Y-m-d')). '.' . $extension;
            $path = $request->file('image')->storeAs('images',$new_filename);
            
            if($path) {
                
                $update_training = $fetch_training->update([
                    'title' => $title,
                    'description' => $description,
                    'image' => $new_filename,
                    'slug' =>  Str::slug($title)
                ]);

                if(!$update_training){
                    toastr()->error('Sorry we could not update the training. Try again later');
                    return back();
                }

                toastr()->success('Training Updated Successfully');
                return back();
            }
        }
    }

    public function fetch_all_training_applications(){
        $all_training_applications = DB::table('apply_trainings')->join('trainings','apply_trainings.training_id', '=', 'trainings.id')
        ->select('apply_trainings.*','trainings.title','trainings.description','trainings.status as training_status')
        ->orderBy('apply_trainings.id','desc')->get();
        
        if(!$all_training_applications){
            toastr()->error('Sorry we could not fetch all the Applica');
            return back();
        }
        
        $data = [ 
            'training_applications' => $all_training_applications
        ];
        return view('admin.trainings_apply.view')->with($data);
    }

}
