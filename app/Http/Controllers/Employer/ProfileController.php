<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\Employer;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:employer');
    }
    // fetch user details
    public function fetch_user_details(){
        
        if(!Auth('employer')->check()){
            return redirect('/');  
        }

        $user_id = Auth('employer')->user()->id;

        $states = [
            "NG-AB" => "Abia",
            "NG-AD" => "Adamawa",
            "NG-AK" => "Akwa Ibom",
            "NG-AN" => "Anambra",
            "NG-BA" => "Bauchi",
            "NG-BY" => "Bayelsa",
            "NG-BE" => "Benue",
            "NG-BO" => "Borno",
            "NG-CR" => "Cross River",
            "NG-DE" => "Delta",
            "NG-EB" => "Ebonyi",
            "NG-ED" => "Edo",
            "NG-EK" => "Ekiti",
            "NG-EN" => "Enugu",
            "NG-FC" => "FCT - Abuja",
            "NG-GO" => "Gombe",
            "NG-IM" => "Imo",
            "NG-JI" => "Jigawa",
            "NG-KD" => "Kaduna",
            "NG-KN" => "Kano",
            "NG-KT" => "Katsina",
            "NG-KE" => "Kebbi",
            "NG-KO" => "Kogi",
            "NG-KW" => "Kwara",
            "NG-LA" => "Lagos",
            "NG-NA" => "Nasarawa",
            "NG-NI" => "Niger",
            "NG-OG" => "Ogun",
            "NG-ON" => "Ondo",
            "NG-OS" => "Osun",
            "NG-OY" => "Oyo",
            "NG-PL" => "Plateau",
            "NG-RI" => "Rivers",
            "NG-SO" => "Sokoto",
            "NG-TA" => "Taraba",
            "NG-YO" => "Yobe",
            "NG-ZA" => "Zamfara"
        ];

        // $states_json = json_decode($path, true); 

        // dd($states_json);

        $user_details = Employer::find($user_id);

        if(!$user_details){
            // user not found 
            return back();
        }

        $data = [
            'user' => $user_details,
            'states' => $states
        ];
        return view('employers.profile.view-profile')->with($data);
    }

    public function update_profile(Request $request){
        // dd($request->all());
        // name , email , image,
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user_id = Auth('employer')->user()->id;
        $name = $request->input('name');
        $email = $request->input('email');

        if ($request->file('image')->isValid()) {
            // file is valid 
            // upload the file 
            $extension = $request->file('image')->extension();
            $filename = $request->file('image')->getClientOriginalName();
            $new_filename = Str::slug($filename . date('Y-m-d')). '.' . $extension;
            $path = $request->file('image')->storeAs('images',$new_filename);
            
            if($path) {
                // insert the document details to the db
                $user_details = employer::find($user_id);
                
                // dd($user_details);

                $update_user = $user_details->update([
                    'name' => $name,
                    'email' => $email, 
                    'image' => $new_filename
                ]); 

                if($update_user){
                    toastr()->success('User Details Updated Successfully');
                    return redirect()->route('employer.view-profile');
                }else{
                    toastr()->error('User Profile could not be Updated');
                    return redirect()->route('employer.view-profile');
                }
            }else{
                toastr()->error('Sorry we could not upload your picture');
                return redirect()->route('employer.view-profile');
            }  
        }
    }

    public function change_password(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $old_password = $request->input('old_password');
        $new_password = $request->input('password');
        // $hash_old_password = Hash::make($old_password);

        $hash_new_password = Hash::make($new_password);
        $saved_password = Auth('employer')->user()->password;

        if (!Hash::check($old_password, $saved_password)) {
            // The passwords match...
            toastr()->error('Old password is incorrect');
            return redirect()->route('employer.view-profile');
        }

        $user_id = Auth('employer')->user()->id;
        $user_details = Employer::find($user_id);
        $save_new_password = $user_details->update([
            'password' => $hash_new_password
        ]);

        if($save_new_password){
            toastr()->success('Password Changed Successfully');
            return redirect()->route('employer.view-profile');
        }else{
            toastr()->error('Sorry we could not change your password at the moment. Try again later');
            return redirect()->route('employer.view-profile');
        }
    }
}
