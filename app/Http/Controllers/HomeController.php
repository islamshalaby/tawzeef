<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\APIHelpers;
use App\Http\Requests\SendContactMessage;
use JD\Cloudder\Facades\Cloudder;
use App\Category;
use App\Company;
use App\Job;
use App\Setting;
use App\Country;
use App\User;
use App\RequestJob;
use App\Skill;
use App\Course;
use App\Experience;
use App\WebsiteAd;
use App\Exam;
use App\UserExam;
use App\ContactUs;
use App\JobType;
use App\Qualification;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:web' , ['except' => ['index']]);
    }
    // index
    public function index() {
        // dd(Auth::guard('user')->user());
        $data['categories'] = Category::where('deleted', 0)->take(8)->get();
        $data['website_ads'] = WebsiteAd::where('place', 1)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        if (isset(Auth::guard('user')->user()->id)) {
            $data['suggested_jobs'] = Job::where('category_id', Auth::guard('user')->user()->category_id)->where('deleted', 0)->orderBy('views', 'desc')->take(4)->get();
            $data['recent_jobs'] = Job::select('id', 'title_ar', 'title_en', 'salary_from', 'salary_to', 'job_type', 'company_id', 'category_id', 'created_at', 'image')->where('category_id', Auth::guard('user')->user()->category_id)->where('deleted', 0)->where('created_at', ">", DB::raw('NOW() - INTERVAL 8 WEEK'))->take(10)->get();
        }else {
            $data['suggested_jobs'] = Job::where('deleted', 0)->orderBy('views', 'desc')->take(4)->get();
            $data['recent_jobs'] = Job::select('id', 'title_ar', 'title_en', 'salary_from', 'salary_to', 'job_type', 'company_id', 'category_id', 'created_at', 'image')->where('deleted', 0)->where('created_at', ">", DB::raw('NOW() - INTERVAL 8 WEEK'))->take(10)->get();
        }
        $data['all_recent_jobs'] = Job::select('id', 'title_ar', 'title_en', 'salary_from', 'salary_to', 'job_type', 'company_id', 'category_id', 'created_at', 'image')->where('deleted', 0)->where('created_at', ">", DB::raw('NOW() - INTERVAL 8 WEEK'))->take(10)->get();
        $data['jobs_count'] = Job::where('deleted', 0)->get()->count();
        $data['companies_count'] = Company::where('deleted', 0)->get()->count();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['users_count'] = User::where('active', 1)->get()->count();

        return view("index", ['data' => $data]);
    }

    // categories
    public function getCategories() {
        $data['categories'] = Category::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();

        return view("categories", ['data' => $data]);
    }

    // job details
    public function jobDetails(Job $job) {
        $data['categories'] = Category::where('deleted', 0)->take(8)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        if(isset(Auth::guard('user')->user()->id)) {
            $data['requests'] = RequestJob::where('user_id', Auth::guard('user')->user()->id)->pluck('job_id')->toArray();
            $data['exam'] = UserExam::where('user_id', Auth::guard('user')->user()->id)->where('category_id', $job->category_id)->first();
        }
        $job->update(['views' => $job->views + 1]);
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['job'] = $job;
        $data['jobs_related'] = Job::where('deleted', 0)->where('id', '!=' , $job['id'])->where('category_id', $job->category_id)->select('id', 'title_ar', 'company_id', 'short_description_ar', 'created_at', 'image', 'short_description_ar')->take(4)->inRandomOrder()->get();

        return view("job_details", ['data' => $data]);
    }

    // get companies
    public function getCompanies() {
        $data['categories'] = Category::where('deleted', 0)->select('id', 'title_ar')->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['companies'] = Company::where('deleted', 0)->select('id', 'category_id', 'image')->get();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();

        return view("companies", ['data' => $data]);
    }

    // get jobs
    public function getJobs(Request $request){
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['website_ads'] = WebsiteAd::where('place', 2)->get();
        $data['jobs'] = Job::where('deleted', 0);
        if (isset($request->company_id) && !empty($request->company_id)) {
            $data['jobs'] = $data['jobs']->where('company_id', $request->company_id);
            $data['company'] = Company::where('id', $request->company_id)->select('name_ar')->first()['name_ar'];
        }
        if (isset($request->category_id) && !empty($request->category_id)) {
            $data['jobs'] = $data['jobs']->where('category_id', $request->category_id);
            $data['category'] = Category::where('id', $request->category_id)->select('title_ar')->first()['title_ar'];
        }
        if (isset($request->job_name) && !empty($request->job_name)) {
            $data['jobs'] = $data['jobs']->where('title_ar', 'like', '%' . $request->job_name . '%');
        }
        
        $data['jobs_count'] = $data['jobs']->get()->count();
        $data['jobs'] = $data['jobs']->paginate(10);
        // dd($data['jobs'][0]['title_ar']);
        

        return view("jobs", ['data' => $data]);
    }

    // apply to job
    public function applyJob(Request $request) {
        $user = Auth::guard('user')->user();
        RequestJob::create([
            'user_id' => $user->id,
            'job_id' => $request->job_id,
            'status' => 1
        ]);

        return redirect()->back()->with('success', 'تم التقدم لهذه الوظيفة بنجاح');;
    }

    // get profile
    public function getProfile() {
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['user'] = Auth::guard('user')->user();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();


        return view('profile', ['data' => $data]);
    }

    // get company profile
    public function getCompanyProfile() {
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['user'] = Auth::guard('company')->user();
        // dd($data['user']);
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();


        return view('profile_companies', ['data' => $data]);
    }

    // post profile
    public function updateProfile(Request $request) {
        $user = User::where('id', Auth::guard('user')->user()->id)->first();
        $post = $request->all();
        
        if($request->file('image')){
            $job_image = $user->image;
            $publicId = substr($job_image , 0 , strrpos($job_image , "."));
            if(!empty($user->job_image)) {
                Cloudder::delete($publicId);
            }
            $home_image_name = $request->file('image')->getRealPath();
            Cloudder::upload($home_image_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $post['image'] = $logo_new_name;
        }
        $user->update($post);

        return redirect()->back();
    }

    // post company profile
    public function updateCompanyProfile(Request $request) {
        $user = Company::where('id', Auth::guard('company')->user()->id)->first();
        $post = $request->all();
        
        if($request->file('image')){
            $job_image = $user->image;
            $publicId = substr($job_image , 0 , strrpos($job_image , "."));
            if(!empty($user->job_image)) {
                Cloudder::delete($publicId);
            }
            $home_image_name = $request->file('image')->getRealPath();
            Cloudder::upload($home_image_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $post['image'] = $logo_new_name;
        }
        $user->update($post);

        return redirect()->back();
    }

    // get company jobs
    public function getCompanyJobs() {
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['user'] = Auth::guard('company')->user();
        $data['jobs'] = Job::where('company_id', Auth::guard('company')->user()->id)->where('deleted', 0)->paginate(10);

        return view('company_jobs', ['data' => $data]);
    }

    // get edit job
    public function getEditJob(Job $job) {
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['user'] = Auth::guard('company')->user();
        $data['job'] = $job;
        $data['job_types'] = JobType::where('deleted', 0)->get();
        $data['qualifications'] = Qualification::where('deleted', 0)->get();
        
        return view('job_edit', ['data' => $data]);
    }

    // update job
    public function editJobPost(Request $request, Job $job){
        // dd($request->all());
        $job = Job::find($job->id);
        
        if($request->file('image')){
            $image = $job->image;
            $publicId = substr($image, 0 ,strrpos($image, "."));    
            Cloudder::delete($publicId);
            $image_name = $request->file('image')->getRealPath();
            Cloudder::upload($image_name, null);
            $imagereturned = Cloudder::getResult();
            $image_id = $imagereturned['public_id'];
            $image_format = $imagereturned['format'];    
            $image_new_name = $image_id.'.'.$image_format;
            $job->image = $image_new_name;
        }
        
        $job->title_ar = $request->title_ar;
        $job->title_en = $request->title_en;
        $job->experience_from = $request->experience_from;
        $job->experience_to = $request->experience_to;
        $job->job_type = $request->job_type;
        $job->age_from = $request->age_from;
        $job->age_to = $request->age_to;
        $job->salary_from = $request->salary_from;
        $job->salary_to = $request->salary_to;
        $job->gender = $request->gender;
        $job->decription_ar = $request->decription_ar;
        $job->decription_en = $request->decription_en;
        $job->short_description_ar = $request->short_description_ar;
        $job->short_description_en = $request->short_description_en;
        $job->english = $request->english;
        $job->qualification_id = $request->qualification_id;
        $job->category_id = $request->category_id;

        $job->save();
        return redirect()->back();
    }

    // delete job
    public function deleteJob(Job $job) {
        $job->deleted = 1;
        $job->save();

        return redirect()->back();
    }

    // get company job requests
    public function getCompanyJobRequests(Job $job) {
        $data['requests'] = $job->requests;
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['user'] = Auth::guard('company')->user();

        return view('company_job_requests', ['data' => $data]);
    }

    // accept / reject
    public function acceptReject(RequestJob $req, $status) {
        $req->update(['status' => $status]);

        return redirect()->back();
    }

    // exams results
    public function getExamsResults(Request $request) {
        $data['exams'] = UserExam::where('user_id', $request->user_id)->get();
        $data['usr'] = User::where('id', $request->user_id)->first();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['user'] = Auth::guard('company')->user();

        return view('user_exams', ['data' => $data]);
    }

    // get create job
    public function getCreateJob() {
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['user'] = Auth::guard('company')->user();
        $data['job_types'] = JobType::where('deleted', 0)->get();
        $data['qualifications'] = Qualification::where('deleted', 0)->get();
        
        return view('create_job', ['data' => $data]);
    }

    // post create job
    public function postCreateJob(Request $request) {
        $image_name = $request->file('image')->getRealPath();
        Cloudder::upload($image_name, null);
        $imagereturned = Cloudder::getResult();
        $image_id = $imagereturned['public_id'];
        $image_format = $imagereturned['format'];    
        $image_new_name = $image_id.'.'.$image_format;
        $job = new Job();
        $job->image = $image_new_name;
        $job->title_ar = $request->title_ar;
        $job->title_en = $request->title_en;
        $job->company_id = Auth::guard('company')->user()->id;
        $job->experience_from = $request->experience_from;
        $job->experience_to = $request->experience_to;
        $job->job_type = $request->job_type;
        $job->age_from = $request->age_from;
        $job->age_to = $request->age_to;
        $job->salary_from = $request->salary_from;
        $job->salary_to = $request->salary_to;
        $job->gender = $request->gender;
        $job->decription_ar = $request->decription_ar;
        $job->decription_en = $request->decription_en;
        $job->short_description_ar = $request->short_description_ar;
        $job->short_description_en = $request->short_description_en;
        $job->english = $request->english;
        $job->qualification_id = $request->qualification_id;
        $job->category_id = $request->category_id;
        $job->save();

        return redirect()->route('post.company.jobs'); 
    }

    // get user resume
    public function getUserResume($user_id) {
        $data['user'] = Auth::guard('company')->user();
        $data['usr'] = User::where('id', $user_id)->first();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['skills'] = Skill::where('user_id' , $user_id)->get();
        $data['courses'] = Course::where('user_id' , $user_id)->get();        
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['experiences'] = Experience::where('user_id' , $user_id)->get(); 

        return view('user_resume', ['data' => $data]);
    }

    // get my requests
    public function getMyRequests() {
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['user'] = User::where('id', Auth::guard('user')->user()->id)->first();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();

        return view('requests', ['data' => $data]);
    }

    public function getresume(){
        $data['user'] = User::where('id', Auth::guard('user')->user()->id)->first();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['skills'] = Skill::where('user_id' , Auth::guard('user')->user()->id)->get();
        $data['courses'] = Course::where('user_id' , Auth::guard('user')->user()->id)->get();        
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['experiences'] = Experience::where('user_id' , Auth::guard('user')->user()->id)->get(); 
        return view('resume', ['data' => $data]);
    }

    public function postJobTitle(Request $request){
        $user = User::find(Auth::guard('user')->user()->id);
        $user->job_title = $request->job_title;
        $user->experience_years = $request->experience_years;
        $user->save();
        return redirect('profile/resume');
    }

    public function postsummary(Request $request){
        $user = User::find(Auth::guard('user')->user()->id);
        $user->summary = $request->summary;
        $user->save();
        return redirect('profile/resume');
    }

    public function addskills(Request $request){
        $skill = new Skill();
        $skill->user_id = Auth::guard('user')->user()->id;
        $skill->title = $request->title;
        $skill->level = $request->level;
        $skill->save();
        return redirect('profile/resume');
    }

    public function editskills(Request $request){
        $skill = Skill::find($request->skill_id);
        $skill->title = $request->title;
        $skill->level = $request->level;
        $skill->save();
        return redirect('profile/resume');
    }

    public function addcourse(Request $request){
        $course = new Course();
        $course->user_id = Auth::guard('user')->user()->id;
        $course->name = $request->name;
        $course->center = $request->center;
        $course->period = $request->period;
        $course->year = $request->year;
        $course->save();
        return redirect('profile/resume');
    }

    public function editcourse(Request $request){
        $course = Course::find($request->course_id);
        $course->name = $request->name;
        $course->center = $request->center;
        $course->period = $request->period;
        $course->year = $request->year;
        $course->save();
        return redirect('profile/resume');
    }


    public function addexperience(Request $request){
        $item = new Experience();
        $item->user_id = Auth::guard('user')->user()->id;
        $item->job_title = $request->job_title;
        $item->company_name = $request->company_name;
        $item->start_date = $request->start_date;
        $item->end_date = $request->end_date;
        $item->salary = $request->salary;
        $item->save();
        return redirect('profile/resume');
    }

    public function editexperience(Request $request){
        $item = Experience::find($request->experience_id);
        $item->job_title = $request->job_title;
        $item->company_name = $request->company_name;
        $item->start_date = $request->start_date;
        $item->end_date = $request->end_date;
        $item->salary = $request->salary;
        $item->save();
        return redirect('profile/resume');
    }

    public function checkExam(Request $request){
        $job_id = $request->job_id;
        $user_id = Auth::guard('user')->user()->id;
        $job = Job::find($job_id);
        $category_id = $job->category_id;
        $user_exam = UserExam::where('user_id' , $user_id)->where('category_id' , $category_id)->first();
        if($user_exam){
            return response()->json($user_exam , 200);
        }else{
            return response()->json(null , 200);
        }
    }

    // exams
    public function getCategoriesExams(Request $request) {
        $data['categories'] = Category::where('deleted', 0)->get();
        $data['user'] = User::where('id', Auth::guard('user')->user()->id)->first();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();

        return view('exams_categories', ['data' => $data]);
    }

    // single exam
    public function singleExam(Category $category) {
        $data['category'] = $category;
        $data['exams'] = Exam::where('category_id', $category->id)->get();
        $data['user'] = User::where('id', Auth::guard('user')->user()->id)->first();
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();
        $data['exam'] = UserExam::where('category_id', $category->id)->where('user_id', Auth::guard('user')->user()->id)->first();

        return view('exam', ['data' => $data]);
    }

    // add each question result
    public function addEachQuestionResult(Request $request) {
        $userId = Auth::guard('user')->user()->id;
        $examId = $request->examId;
        $answer = $request->answer;
        $exam = Exam::find($examId);
        $questions = Exam::where('category_id', $request->category_id)->get()->count();
        $userExam = UserExam::where('user_id', $userId)->where('category_id', $request->category_id)->first();
        $userResult = 0;
        if ($userExam) {
            $userResult = $userExam->result;
            if ( ($exam->first_answer_en == $answer && $exam->true_answer == 1) ||
            ($exam->second_answer_en == $answer && $exam->true_answer == 2) || 
            ($exam->third_answer_en == $answer && $exam->true_answer == 3) || 
            ($exam->fourth_answer_en == $answer && $exam->true_answer == 4) ) {
                $userExam->result = $userResult + 1;
            }
            $userExam->percentage = ($userExam->result / $questions) * 100;
            $userExam->question = $userExam->question + 1;
            if ($questions == $userExam->question) {
                $userExam->completed = 1;
            }
            $userExam->save();
        }else {
            $result = 0;
            $completed = 0;
            if ( ($exam->first_answer_en == $answer && $exam->true_answer == 1) ||
            ($exam->second_answer_en == $answer && $exam->true_answer == 2) || 
            ($exam->third_answer_en == $answer && $exam->true_answer == 3) || 
            ($exam->fourth_answer_en == $answer && $exam->true_answer == 4) ) {
                $result = 1;
            }
            if ($questions == 1) {
                $completed = 1;
            }
            $userExam = UserExam::create([
                'user_id' => $userId,
                'category_id' => $request->category_id,
                'result' => $result,
                'percentage' => ($result / $questions) * 100,
                'completed' => $completed,
                'question' => 1
            ]);
        }
        
        return response($userExam, 200);
    }

    // verify phone
    public function verifyPhone() {
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();

        return view('verify_phone', ['data' => $data]);
    }

    // about us
    public function aboutUs() {
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();

        return view('about_us', ['data' => $data]);
    }

    // terms - conditions
    public function termsConditions() {
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();

        return view('terms_conditions', ['data' => $data]);
    }

    // contactus
    public function contactUs() {
        $data['setting'] = Setting::where('id', 1)->first();
        $data['countries'] = Country::where('deleted', 0)->get();
        $data['cats'] = Category::where('deleted', 0)->get();

        return view('contact_us', ['data' => $data]);
    }

    // post contactus
    public function postContactUs(Request $request) {
        $request->validate([
            'phone' => 'required',
            'message' => 'required'
        ]);

        $contact = new ContactUs;
        $contact->phone = $request->phone;
        $contact->name = $request->name;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back();
    }


}