<?php

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

Route::get('/setlocale/{locale}',function($lang){
    Session::put('locale',$lang);
    return redirect()->back();   
});



// Dashboard Routes
Route::group([
    'middleware'=>'language',
    'prefix' => "admin-panel",
    'namespace' => "Admin"  
] , function($router){

    Route::get('' ,'HomeController@show');
    Route::get('login' ,  [ 'as' => 'adminlogin', 'uses' => 'AdminController@getlogin']);
    Route::post('login' , 'AdminController@postlogin');
    Route::get('logout' , 'AdminController@logout');
    Route::get('profile' , 'AdminController@profile');
    Route::post('profile' , 'AdminController@updateprofile');    
    Route::get('databasebackup' , 'AdminController@backup');

    // Users routes for dashboard
    Route::group([
        'prefix' => 'users',
    ] , function($router){
            Route::get('add' , 'UserController@AddGet');
            Route::post('add' , 'UserController@AddPost');
            Route::get('show' , 'UserController@show');
            Route::get('edit/{id}' , 'UserController@edit');
            Route::post('edit/{id}' , 'UserController@EditPost');
            Route::get('details/{id}' , 'UserController@details');
            Route::post('send_notifications/{id}' , 'UserController@SendNotifications');
            Route::get('block/{id}' , 'UserController@block');
            Route::get('active/{id}' , 'UserController@active');
        }
    );

    // admins routes for dashboard
    Route::group([
        'prefix' => "managers",
    ], function($router){
        Route::get('add' , 'ManagerController@AddGet');
        Route::post('add' , 'ManagerController@AddPost');
        Route::get('show' , 'ManagerController@show');
        Route::get('edit/{id}' , 'ManagerController@edit');
        Route::post('edit/{id}' , 'ManagerController@EditPost');
        Route::get('delete/{id}' , 'ManagerController@delete');
    });

    // App Pages For Dashboard
    Route::group([
        'prefix' => 'app_pages'
    ] , function($router){
        Route::get('aboutapp' , 'AppPagesController@GetAboutApp');
        Route::post('aboutapp' , 'AppPagesController@PostAboutApp');
        Route::get('termsandconditions' , 'AppPagesController@GetTermsAndConditions');
        Route::post('termsandconditions' , 'AppPagesController@PostTermsAndConditions');
    });

    // Setting Route
    Route::get('settings' , 'SettingController@GetSetting');
    Route::post('settings' , 'SettingController@PostSetting');

    // Rates
    Route::get('rates' , 'RateController@Getrates');
   Route::get('rates/active/{id}' , 'RateController@activeRate');

    // meta tags Route
    Route::get('meta_tags' , 'MetaTagController@getMetaTags');
    Route::post('meta_tags' , 'MetaTagController@postMetaTags');

    // Ads Route
    Route::group([
        "prefix" => "ads"
    ],function($router){
        Route::get('add' , 'AdController@AddGet');
        Route::post('add' , 'AdController@AddPost');
        Route::get('show' , 'AdController@show');
        Route::get('edit/{id}' , 'AdController@EditGet');
        Route::post('edit/{id}' , 'AdController@EditPost');
        Route::get('details/{id}' , 'AdController@details');
        Route::get('delete/{id}' , 'AdController@delete');
    });

    // Categories Route
    Route::group([
        "prefix" => "categories"
    ], function($router){
         Route::get('add' , 'CategoryController@AddGet');
         Route::post('add' , 'CategoryController@AddPost');
         Route::get('show' , 'CategoryController@show');
         Route::get('edit/{id}' , 'CategoryController@EditGet');
         Route::post('edit/{id}' , 'CategoryController@EditPost');
         Route::get('delete/{id}' , 'CategoryController@delete');
         
         // exams
         Route::get('{id}/exams' , 'CategoryController@getexam');
         Route::get('{id}/exams/addnew' , 'CategoryController@getaddnewquestion');
         Route::post('{id}/exams/addnew' , 'CategoryController@postaddnewquestion');
         Route::get('{id}/exams/edit/{question_id}' , 'CategoryController@geteditquestion');
         Route::post('{id}/exams/edit/{question_id}' , 'CategoryController@posteditquestion');
         Route::get('{id}/exams/delete/{question_id}' , 'CategoryController@deletequestion');        
    });

        // countries Route
        Route::group([
            "prefix" => "countries"
        ], function($router){
             Route::get('add' , 'CategoryController@AddGetCountry');
             Route::post('add' , 'CategoryController@AddPostCountry');
             Route::get('show' , 'CategoryController@showCountry');
             Route::get('edit/{id}' , 'CategoryController@EditGetCountry');
             Route::post('edit/{id}' , 'CategoryController@EditPostCountry');
             Route::get('delete/{id}' , 'CategoryController@deleteCountry');        
        });


                // job_types Route
        Route::group([
            "prefix" => "job_types"
        ], function($router){
             Route::get('add' , 'CategoryController@AddGetJobType');
             Route::post('add' , 'CategoryController@AddPostJobType');
             Route::get('show' , 'CategoryController@showJobType');
             Route::get('edit/{id}' , 'CategoryController@EditGetJobType');
             Route::post('edit/{id}' , 'CategoryController@EditPostJobType');
             Route::get('delete/{id}' , 'CategoryController@deleteJobType');        
        });

        // qualifications Route
        Route::group([
            "prefix" => "qualifications"
        ], function($router){
             Route::get('add' , 'CategoryController@AddGetQualification');
             Route::post('add' , 'CategoryController@AddPostQualification');
             Route::get('show' , 'CategoryController@showQualification');
             Route::get('edit/{id}' , 'CategoryController@EditGetQualification');
             Route::post('edit/{id}' , 'CategoryController@EditPostQualification');
             Route::get('delete/{id}' , 'CategoryController@deleteQualification');        
        });

        // companies Route
        Route::group([
            "prefix" => "companies"
        ], function($router){
             Route::get('add' , 'CompanyController@AddGet');
             Route::post('add' , 'CompanyController@AddPost');
             Route::get('show' , 'CompanyController@show');
             Route::get('edit/{id}' , 'CompanyController@EditGet');
             Route::post('edit/{id}' , 'CompanyController@EditPost');
             Route::get('delete/{id}' , 'CompanyController@delete');        
        });


        // jobs Route
        Route::group([
            "prefix" => "jobs"
        ], function($router){
            Route::get('add' , 'JobController@AddGet');
            Route::post('add' , 'JobController@AddPost');
            Route::get('show' , 'JobController@show');
            Route::get('edit/{id}' , 'JobController@EditGet');
            Route::post('edit/{id}' , 'JobController@EditPost');
            Route::get('delete/{id}' , 'JobController@delete');
            Route::get('{job_id}/requests' , 'JobController@getJobs');        
        });


    // Contact Us Messages Route
    Route::group([
        "prefix" => "contact_us"
    ] , function($router){
        Route::get('' , 'ContactUsController@show');
        Route::get('details/{id}' , 'ContactUsController@details');
        Route::get('delete/{id}' , 'ContactUsController@delete');
    });

     // Website Ads Route
     Route::group([
        "prefix" => "website_ads"
    ] , function($router){
        Route::get('' , 'WebsiteAdController@show')->name('website.ads.index');
        Route::get('add' , 'WebsiteAdController@AddGet')->name('website.ads.add');
        Route::post('add' , 'WebsiteAdController@AddPost');
        Route::get('edit/{id}' , 'WebsiteAdController@EditGet');
        Route::post('edit/{id}' , 'WebsiteAdController@EditPost');
        Route::get('details/{id}' , 'WebsiteAdController@details');
        Route::get('delete/{id}' , 'WebsiteAdController@delete');
    });

    // Notifications Route
    Route::group([
        "prefix" => "notifications"
    ], function($router){
        Route::get('show' , 'NotificationController@show');
        Route::get('details/{id}' , 'NotificationController@details');
        Route::get('delete/{id}' , 'NotificationController@delete');
        Route::get('send' , 'NotificationController@getsend');
        Route::post('send' , 'NotificationController@send');
        Route::get('resend/{id}' , 'NotificationController@resend');        
    });

});



// Web View Routes 
Route::group([
    'prefix' => "webview"
] , function($router){
    Route::get('aboutapp/{lang}' , 'WebViewController@getabout');
    Route::get('termsandconditions/{lang}' , 'WebViewController@gettermsandconditions' );
});


Route::group([
    'middleware'=>'language' 
], function($router){
// user auth
Route::get('register', 'Auth\RegisterController@register');
Route::get('register-companies', 'Auth\RegisterController@registerCompany');
Route::post('register', 'Auth\RegisterController@storeUser')->name('register.user');
Route::post('login', 'Auth\LoginController@authenticate')->name('login.user');
Route::post('login-companies', 'Auth\LoginController@authenticateCompany')->name('login.company');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.user');
Route::get('logout-companies', 'Auth\LoginController@logoutCompany')->name('logout.company');
Route::put('verifyphone', 'Auth\RegisterController@verifyPhone')->name('verify.phone.user');
Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');
Route::get('login/{website}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{website}/callback', 'Auth\LoginController@handleProviderCallback');

// website
Route::get('/', 'HomeController@index')->name("home");

// requests
Route::get('/requests', 'HomeController@getMyRequests')->name('user.requests');

// profile
Route::get('/profile', 'HomeController@getProfile')->name('user.profile');

// company profile
Route::get('/profile-company', 'HomeController@getCompanyProfile')->name('company.profile');

// update profile
Route::post('/profile', 'HomeController@updateProfile')->name('post.user.profile');

// update company profile
Route::post('/profile-company', 'HomeController@updateCompanyProfile')->name('post.company.profile');

// get company jobs
Route::get('/jobs-company', 'HomeController@getCompanyJobs')->name('post.company.jobs');

// get edit job
Route::get('/job/{job}', 'HomeController@getEditJob')->name('edit.jobs');

// change request status
Route::get('/change/status/{req}/{status}', 'HomeController@acceptReject')->name('change.status.jobs');

// exams results
Route::get('/exams/results/{user_id}', 'HomeController@getExamsResults')->name('exams.results.jobs');

// create job
Route::get('/create/jobs', 'HomeController@getCreateJob')->name('create.jobs');

// post create job
Route::post('/create/jobs', 'HomeController@postCreateJob');

// get user resume
Route::get('/resume/{user_id}', 'HomeController@getUserResume')->name('user.resume.jobs');

// get delete job
Route::get('/delete/job/{job}', 'HomeController@deleteJob')->name('delete.jobs');

// get delete job
Route::get('/jobs/applies/{job}', 'HomeController@getCompanyJobRequests')->name('job.applies');

// post edit job
Route::post('/job/{job}', 'HomeController@editJobPost')->name('post.edit.jobs');

// profile
Route::get('/profile/resume', 'HomeController@getresume');

Route::post('/job_title' , 'HomeController@postJobTitle');

Route::post('/summary' , 'HomeController@postsummary');

Route::post('/add-skills' , 'HomeController@addskills');

Route::post('/edit-skills' , 'HomeController@editskills');

Route::post('/add-course' , 'HomeController@addcourse');

Route::post('/edit-course' , 'HomeController@editcourse');

Route::post('/add-experience' , 'HomeController@addexperience');

Route::post('/edit-experience' , 'HomeController@editexperience');

// update profile
// Route::post('/profile', 'HomeController@updateProfile')->name('post.user.profile');

// categories
Route::get('/categories', 'HomeController@getCategories');

// jobs
Route::get('/jobs', 'HomeController@getJobs');

// apply job
Route::post('/jobs/apply', 'HomeController@applyJob')->name("jobs.apply");

Route::get('/check-exam/{job_id}' , 'HomeController@checkExam');

Route::get('/exams', 'HomeController@getCategoriesExams');

Route::get('/exams/{category}', 'HomeController@singleExam');

Route::post('/exam/answer', 'HomeController@addEachQuestionResult');

Route::get('/activate-phone', 'HomeController@verifyPhone');

// about us
Route::get('/about-us', 'HomeController@aboutUs');

// terms & conditions
Route::get('/terms-conditions', 'HomeController@termsConditions');

// contact us
Route::get('/contact-us', 'HomeController@contactUs');

// post contact us
Route::post('/contact-us', 'HomeController@postContactUs');

// job details
Route::get('/jobs/{job}', 'HomeController@jobDetails');

// companies
Route::get('/companies', 'HomeController@getCompanies');
});