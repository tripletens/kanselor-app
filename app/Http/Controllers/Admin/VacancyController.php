<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employer;
use App\Models\Vacancy;

use Illuminate\Support\Facades\Validator;


class VacancyController extends Controller
{
    //
    public function create_job_vacancy_page(){
        
        $employers = Employer::all();

        $data = [
            'employers' => $employers
        ];

        return view('admin.vacancy.create')->with($data);
    }

    public function create_job_vacancy(Request $request){
        // `title`, `description`, `experience`, `qualification`, `status`, `from_age`, `to_age`,
        //  `is_admin`, `is_employer`, `uploader_id`, `employer_id`, `tribe`,
        $validator = Validator::make($request->all(), [
            "title" => 'required|max:255',
            "description" => 'required',
            "experience" => 'required',
            "qualification" => 'required',
            "from_age" => 'required',
            "to_age" => 'required',
            "employer_id" => 'required',
            "tribe" => 'required'
        ]);
    
        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }

        // create 

        // here admin creates the vacancy

        $is_admin = true;

        $uploader_id = Auth('admin')->user()->id;

        $title = $request->input('title');
        $description = $request->input('description');
        $experience = $request->input('experience');
        $qualification = $request->input('qualification');
        $from_age = $request->input('from_age');
        $to_age = $request->input('to_age');
        $employer_id = $request->input('employer_id');
        $tribe = $request->input('tribe');

        $code = "KAN-" . rand(8,999999);

        $create_vacancy = Vacancy::create([
            'title' => $title, 
            'description' => $description, 
            'experience' => $experience, 
            'qualification' => $qualification,
            'from_age' => $from_age, 
            'to_age' => $to_age, 
            'is_admin' => $is_admin,
            'uploader_id' => $uploader_id, 
            'employer_id' => $employer_id, 
            'tribe' => $tribe,
            'code' => $code
        ]);

        if(!$create_vacancy){
            toastr()->error('Sorry we could not create vacancy at the moment. Try again later');
            return back();
        }

        toastr()->success('Vacancy created successfully');
        return back();

    }

    public function view_admin_vacancies(){
        $admin_vacancies = Vacancy::where('is_admin', '1')->orderby('id','desc')->paginate(10);

        if(!$admin_vacancies){
            toastr()->error('Sorry we could not fetch admin vacancies. Try again later');
            return back();
        }

        $data = [
            'admin_vacancies' => $admin_vacancies
        ];

        return view('admin.vacancy.view-admin')->with($data);
    }
}
