<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Vacancy;

use Illuminate\Support\Facades\Validator;

use DB;

class VacancyController extends Controller
{
    //
    public function create_job_vacancy_page(){
        
        $employers = Employer::all();

        $categories = Category::all();

        $data = [
            'employers' => $employers,
            'categories' => $categories
        ];

        return view('employers.vacancy.create')->with($data);
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
            "tribe" => 'required',
            'category_id' => 'required'
        ]);
    
        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }

        // create 

        // here admin creates the vacancy

        $is_admin = false;

        $uploader_id = Auth('employer')->user()->id;

        $title = $request->input('title');
        $description = $request->input('description');
        $experience = $request->input('experience');
        $qualification = $request->input('qualification');
        $from_age = $request->input('from_age');
        $to_age = $request->input('to_age');
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
            'is_employer' => true,
            'uploader_id' => $uploader_id, 
            'employer_id' => $uploader_id, 
            'tribe' => $tribe,
            'code' => $code,
            'category_id' => $category_id,
            'status' => false
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

        return view('employer.vacancy.view-admin')->with($data);
    }

    public function view_vacancies(){
        $employer_id = Auth('employer')->user()->id;

        $categories = Category::all();
        
        // $my_vacancies = Vacancy::where('is_employer', '1')->where('employer_id', $employer_id)->orderby('id','desc')->paginate(10);

        $my_vacancies = DB::table('vacancies')->join('employers','vacancies.employer_id', '=', 'employers.id')
        ->join('categories','vacancies.category_id', '=', 'categories.id')
        ->where('vacancies.is_employer', '1')->where('employer_id', $employer_id)->select('vacancies.*','employers.name','categories.name as category_name','categories.slug as category_slug')->orderby('id','desc')->paginate(10);
        
        if(!$my_vacancies){
            toastr()->error('Sorry we could not fetch employer vacancies. Try again later');
            return back();
        }

        $data = [
            'my_vacancies' => $my_vacancies,
            'categories' => $categories
        ];

        return view('employers.vacancy.view-vacancies')->with($data);
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
}
