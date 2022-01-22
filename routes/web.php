<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// 
Route::prefix('dashboard')->group(function () {
    // Route::prefix('admin')->middleware(['is_admin', 'auth'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //     Route::get('/user/profile', function () {
    //         // Uses first & second middleware...
    //     });
    // });
    Route::prefix('jobs')->group(function () {
        Route::get('/view-applications', [App\Http\Controllers\JobsController::class, 'view_applications'])->name('view-applications');
        Route::post('/save-application', [App\Http\Controllers\JobsController::class, 'save_application'])->name('save-application');
        Route::get('/apply', [App\Http\Controllers\JobsController::class, 'apply_jobs_page'])->name('apply-jobs');
        // 
        // fetch_job_test
        Route::get('/job-application/{code}', [App\Http\Controllers\JobsController::class, 'view_one_application'])->name('view-one-application');
        Route::get('/view-test/{application_code}',[App\Http\Controllers\JobsController::class, 'fetch_job_test'])->name('view_job_tests');
        Route::post('/submit-test',[App\Http\Controllers\JobsController::class, 'process_test'])->name('process_job_tests');
    });

    Route::prefix('users')->group(function () {
        Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'fetch_my_payments'])->name('my_payments');
    });

    Route::prefix('interviews')->group(function () {
        Route::get('/view-all', [App\Http\Controllers\InterviewController::class, 'fetch_all_interviews'])->name('all-interviews');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/view', [App\Http\Controllers\ProfileController::class, 'fetch_user_details'])->name('view-profile');
        Route::post('/update', [App\Http\Controllers\ProfileController::class, 'update_profile'])->name('update-profile');
        Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'change_password'])->name('change_password');
    });
});

Route::prefix('/admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function(){
    
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');

    });

    Route::get('/dashboard','HomeController@index')->name('home')->middleware('guard.verified:admin,admin.verification.notice');

    //Put all of your admin routes here...guard.verified:admin,admin.verification.notice
    Route::prefix('/jobs')->middleware('guard.verified:admin,admin.verification.notice')->group(function () {
        Route::get('/view','JobController@fetch_job_applications')->name('job_applications');
        Route::get('/view/{code}','JobController@fetch_one_job_application')->name('one_job_application');
        Route::post('/approve/{id}','JobController@approve')->name('approve_job_applications');
        Route::post('/reject/{id}','JobController@reject')->name('reject_job_applications');
        Route::post('/assign-interview','JobController@assign_interview')->name('assign_interview');
    });

    Route::prefix('/category')->middleware('guard.verified:admin,admin.verification.notice')->group(function () {
        Route::get('/view','CategoryController@view_all')->name('view-category');
        Route::post('/add','CategoryController@add_category')->name('add-category');
        Route::post('/delete/{id}','CategoryController@delete_category')->name('delete-category');
        Route::get('/view-test/{id}','CategoryController@view_test_page')->name('view-test-category');
        Route::post('/update/{id}','CategoryController@update')->name('update-category');
    });
    Route::prefix('/question')->middleware('guard.verified:admin,admin.verification.notice')->group(function () {
        Route::post('/add','QuestionController@store')->name('add-question');
        Route::post('/update/{id}','QuestionController@update')->name('update-question');
        Route::post('/delete/{id}','QuestionController@destroy')->name('delete-question');
    });
    Route::prefix('interviews')->middleware('guard.verified:admin,admin.verification.notice')->group(function () {
        Route::get('/view-all', 'InterviewController@fetch_all_interviews')->name('all-interviews');
        Route::post('/save', 'InterviewController@save_interview')->name('save-interview');
        Route::post('/delete/{id}', 'InterviewController@delete_interview')->name('delete-interview');
    });

    Route::prefix('/job-applicants')->middleware('guard.verified:admin,admin.verification.notice')->group(function () {
        Route::get('/view','JobController@fetch_job_applicants')->name('fetch_job_applicants');
        Route::get('/view/{id}','JobController@fetch_job_applicants_by_id')->name('one_job_applicant');
        Route::post('/activate','JobController@activate_user')->name('activate_user');
        Route::post('/deactivate','JobController@deactivate_user')->name('deactivate_user');
        Route::get('/generate-pdf/{code}','JobController@generate_pdf_application')->name('generate_pdf_application');

    });

    Route::prefix('/employers')->middleware('guard.verified:admin,admin.verification.notice')->group(function () {
        Route::get('/view','EmployerController@fetch_all_employers')->name('fetch_all_employers');
        Route::get('/view/{id}','EmployerController@fetch_one_employer')->name('fetch_one_employer');
        Route::post('/activate','EmployerController@activate_employer')->name('activate_employer');
        Route::post('/deactivate','EmployerController@deactivate_employer')->name('deactivate_employer');
    });

    Route::prefix('/vacancies')->middleware('guard.verified:admin,admin.verification.notice')->group(function () {
        Route::get('/create','VacancyController@create_job_vacancy_page')->name('create_job_vacancy_page');
        Route::post('/submit-create','VacancyController@create_job_vacancy')->name('create_job_vacancy');

        Route::get('/view-admin-vacancies','VacancyController@view_admin_vacancies')->name('view_admin_vacancies');
        
        Route::get('/view-employer-vacancies','VacancyController@view_employer_vacancies')->name('view_employer_vacancies');

        Route::post('/edit','VacancyController@edit_vacancy')->name('edit_vacancy');
        Route::post('/delete','VacancyController@delete_vacancy')->name('delete_vacancy');

        Route::post('/approve','VacancyController@approve_vacancy')->name('approve_vacancy');
        Route::post('/reject','VacancyController@reject_vacancy')->name('reject_vacancy');
    });

    Route::prefix('/trainings')->middleware('guard.verified:admin,admin.verification.notice')->group(function () {
        Route::get('/view','TrainingsController@fetch_all_trainings')->name('fetch_all_trainings');
        Route::get('/view/{id}','TrainingsController@fetch_one_training')->name('fetch_one_training');
        Route::post('/create','TrainingsController@create_training')->name('create_training');
        Route::post('/edit','TrainingsController@edit_training')->name('edit_training');
        Route::post('/activate','TrainingsController@activate_training')->name('activate_training');
        Route::post('/deactivate','TrainingsController@deactivate_training')->name('deactivate_training');
        Route::get('/all-applications','TrainingsController@fetch_all_training_applications')->name('fetch_all_training_applications');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/view','ProfileController@fetch_user_details')->name('view-profile');
        Route::post('/update','ProfileController@update_profile')->name('update-profile');
        Route::post('/change-password','ProfileController@change_password')->name('change_password');
    });
});

Route::prefix('/employer')->name('employer.')->namespace('App\Http\Controllers\Employer')->group(function(){
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        Route::post('/register','RegisterController@register')->name('submit.register');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');
        
    });

    Route::get('/dashboard','HomeController@index')->name('home')->middleware('auth:employer');

    // Put all of your employer routes here...

    Route::prefix('/vacancies')->middleware('auth:employer')->group(function () {
        Route::get('/create','VacancyController@create_job_vacancy_page')->name('create_job_vacancy_page');
        Route::post('/submit-create','VacancyController@create_job_vacancy')->name('create_job_vacancy');

        Route::get('/view-vacancies','VacancyController@view_vacancies')->name('view_vacancies');
        
        Route::post('/edit','VacancyController@edit_vacancy')->name('edit_vacancy');
        Route::post('/delete','VacancyController@delete_vacancy')->name('delete_vacancy');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/view','ProfileController@fetch_user_details')->name('view-profile');
        Route::post('/update','ProfileController@update_profile')->name('update-profile');
        Route::post('/change-password','ProfileController@change_password')->name('change_password');
    });


});

Route::get('/', [App\Http\Controllers\LandingController::class,'index'])->name('landing-page');

Route::get('/about', [App\Http\Controllers\LandingController::class,'about'])->name('about-page');

Route::get('/contact-us', [App\Http\Controllers\LandingController::class,'contact'])->name('contact-page');

Route::get('/team', [App\Http\Controllers\LandingController::class,'team'])->name('team-page');

Route::get('/jobs', [App\Http\Controllers\LandingController::class,'jobs'])->name('jobs-page');

Route::get('/blog', [App\Http\Controllers\LandingController::class,'blog'])->name('blog-page');

Route::get('/testimonials', [App\Http\Controllers\LandingController::class,'testimonials'])->name('testimonials-page');

Route::get('/terms', [App\Http\Controllers\LandingController::class,'terms'])->name('terms-page');

Route::get('/trainings', [App\Http\Controllers\LandingController::class,'trainings'])->name('training-page');

Route::get('/trainings/{slug}', [App\Http\Controllers\LandingController::class,'trainings_one'])->name('training-one-page');

Route::post('/apply-training', [App\Http\Controllers\LandingController::class,'apply_training'])->name('apply-training');

Route::post('/send-contact-mail', [App\Http\Controllers\LandingController::class,'send_contact_mail'])->name('send-contact-mail');



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
