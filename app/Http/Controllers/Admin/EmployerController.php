<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employer;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class EmployerController extends Controller
{
    // fetch the employer 

    public function fetch_all_employers(){
        $all_employers = Employer::all();

        if(!$all_employers){
            toastr()->error('Sorry Employer record not found');
            return back();
        }

        $data = [
            'employers' => $all_employers
        ];

        return view('admin.employers.view')->with($data);
    }

    public function fetch_one_employer($employer_id){
        $fetch_employer = Employer::find($employer_id);

        if(!$fetch_employer){
            toastr()->error('Sorry Employer record not found');
            return back();
        }

        $data = [
            'employer' => $fetch_employer
        ];

        return view('admin.employers.view-one')->with($data);
    }

    public function deactivate_employer(Request $request){

        $employer_id = $request->input('employer_id');

        $employer = Employer::find($employer_id);

        if(!$employer){
            toastr()->error('Sorry Employer record not found');
            return back();
        }

        $deactivate_employer = $employer->update(['status' => '0']);

        if(!$deactivate_employer){
            toastr()->error('Sorry Employer record could not be deactivated');
            return back();
        }

        toastr()->success('Employer deactivated successfully');
        return back();
    }

    public function activate_employer(Request $request){

        $employer_id = $request->input('employer_id');

        $employer = Employer::find($employer_id);

        if(!$employer){
            toastr()->error('Sorry Employer record not found');
            return back();
        }

        $deactivate_employer = $employer->update(['status' => '1']);

        if(!$deactivate_employer){
            toastr()->error('Sorry Employer record could not be activated');
            return back();
        }

        toastr()->success('Employer activated successfully');
        return back();
    }
}
