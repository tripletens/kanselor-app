<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employer;
use App\Models\Vacancy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;

class VacancyController extends Controller
{
    //
    public function create_job_vacancy_page(){

        $categories = Category::all();
        
        $employers = Employer::all();

        $data = [
            'employers' => $employers,
            'categories' => $categories
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
            "tribe" => 'required',
            'category_id' => 'required'
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
        $category_id = $request->input('category_id');

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
            'code' => $code,
            'category_id' => $category_id,
            'status' => 1
        ]);

        if(!$create_vacancy){
            toastr()->error('Sorry we could not create vacancy at the moment. Try again later');
            return back();
        }

        toastr()->success('Vacancy created successfully');
        return back();

    }

    public function view_admin_vacancies(){
        
        // $admin_vacancies = Vacancy::where('is_admin', '1')->orderby('id','desc')->paginate(10);

        $categories = Category::all();

        $admin_vacancies = DB::table('vacancies')->join('employers','vacancies.employer_id', '=', 'employers.id')
        ->join('categories','vacancies.category_id', '=', 'categories.id')
        ->where('vacancies.is_admin', '1')->select('vacancies.*','employers.name','categories.name as category_name','categories.slug as category_slug')->orderby('id','desc')->paginate(10);
        
        if(!$admin_vacancies){
            toastr()->error('Sorry we could not fetch admin vacancies. Try again later');
            return back();
        }

        $data = [
            'admin_vacancies' => $admin_vacancies,
            'categories' => $categories
        ];

        return view('admin.vacancy.view-admin')->with($data);
    }

    public function view_employer_vacancies(){

        $categories = Category::all();

        $employer_vacancies = DB::table('vacancies')->join('employers','vacancies.employer_id', '=', 'employers.id')
        ->join('categories','vacancies.category_id', '=', 'categories.id')
        ->where('vacancies.is_employer', '1')->select('vacancies.*','employers.name','categories.name as category_name','categories.slug as category_slug')->orderby('id','desc')->paginate(10);

        if(!$employer_vacancies){
            toastr()->error('Sorry we could not fetch employer vacancies. Try again later');
            return back();
        }

        $data = [
            'employer_vacancies' => $employer_vacancies,
            'categories' => $categories
        ];

        return view('admin.vacancy.view-employer')->with($data);
    }

    public function edit_vacancy(Request $request){
        $validator = Validator::make($request->all(), [
            "title" => 'required|max:255',
            "description" => 'required',
            "experience" => 'required',
            "qualification" => 'required',
            "from_age" => 'required',
            "to_age" => 'required',
            "tribe" => 'required',
            "vacancy_id" => 'required',
            'category_id' => 'required'
        ]);
    
        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }

        $title = $request->input('title');
        $description = $request->input('description');
        $experience = $request->input('experience');
        $qualification = $request->input('qualification');
        $from_age = $request->input('from_age');
        $to_age = $request->input('to_age');
        $tribe = $request->input('tribe');

        $vacancy_id = $request->input('vacancy_id');

        $category_id = $request->input('category_id');

        // echo $vacancy_id; exit();

        $fetch_vacancy = Vacancy::find($vacancy_id);

        if(!$fetch_vacancy){
            toastr()->error('Sorry vacancy doesnt exist');
            return back();
        }

        $update_vacancy = $fetch_vacancy->update([
            'title' => $title, 
            'description' => $description, 
            'experience' => $experience, 
            'qualification' => $qualification,
            'from_age' => $from_age, 
            'to_age' => $to_age,
            'tribe' => $tribe,
            'category_id' => $category_id
        ]);

        if(!$update_vacancy){
            toastr()->error('Sorry vacancy doesnt exist');
            return back();
        }

        toastr()->success('Vacancy Updated Successfully');
        return back();
    }

    public function delete_vacancy(Request $request){

        $vacancy_id = $request->input('vacancy_id');

        // echo $vacancy_id; exit();

        $fetch_vacancy = Vacancy::find($vacancy_id);

        if(!$fetch_vacancy){
            toastr()->error('Sorry vacancy doesnt exist');
            return back();
        }

        $delete_vacancy = $fetch_vacancy->delete();

        if(!$delete_vacancy){
            toastr()->error('Sorry vacancy doesnt exist');
            return back();
        }

        toastr()->success('Vacancy Deleted Successfully');
        return back();
    }

    public function approve_vacancy(Request $request){

        $vacancy_id = $request->input('vacancy_id');

        // echo $vacancy_id; exit();

        $fetch_vacancy = Vacancy::find($vacancy_id);

        if(!$fetch_vacancy){
            toastr()->error('Sorry vacancy doesnt exist');
            return back();
        }

        $delete_vacancy = $fetch_vacancy->update(['status' => 1]);

        if(!$delete_vacancy){
            toastr()->error('Sorry vacancy doesnt exist');
            return back();
        }

        toastr()->success('Vacancy Approved Successfully');
        return back();
    }

    public function reject_vacancy(Request $request){

        $vacancy_id = $request->input('vacancy_id');

        // echo $vacancy_id; exit();

        $fetch_vacancy = Vacancy::find($vacancy_id);

        if(!$fetch_vacancy){
            toastr()->error('Sorry vacancy doesnt exist');
            return back();
        }

        $reject_vacancy = $fetch_vacancy->update(['status' => 0]);

        if(!$reject_vacancy){
            toastr()->error('Sorry vacancy doesnt exist');
            return back();
        }

        toastr()->success('Vacancy rejected Successfully');
        return back();
    }
}
