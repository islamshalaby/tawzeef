<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Category;
use App\Country;
use App\Job;
use App\JobType;
use App\Qualification;
use App\RequestJob;
use App\User;

class JobController extends AdminController{
    public function AddGet(){
        $data['categories'] = Category::where('deleted' , 0)->get();
        // $data['countries'] = Country::where('deleted' , 0)->get();
        $data['companies'] = Company::where('deleted' , 0)->get();
        $data['job_types'] = JobType::where('deleted' , 0)->get(); 
        $data['qualifications'] = Qualification::where('deleted' , 0)->get();           
        return view('admin.job_form' , ['data' => $data]);
    }

        // type : post -> add new company
        public function AddPost(Request $request){
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
            $job->company_id = $request->company_id;
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
            return redirect('admin-panel/jobs/show'); 
        }
    
        // get all jobs
        public function show(){
            $data['jobs'] = Job::where('deleted' , 0)->orderBy('id' , 'desc')->get();
            return view('admin.jobs' , ['data' => $data]);
        }
    
        // get edit page
        public function EditGet(Request $request){
            $data['job'] = Job::find($request->id);
            $data['categories'] = Category::where('deleted' , 0)->get();
            // $data['countries'] = Country::where('deleted' , 0)->get();
            $data['companies'] = Company::where('deleted' , 0)->get();
            $data['job_types'] = JobType::where('deleted' , 0)->get(); 
            $data['qualifications'] = Qualification::where('deleted' , 0)->get(); 
            return view('admin.job_edit' , ['data' => $data ]);
        }
    
        // edit company
        public function EditPost(Request $request){
            $job = Job::find($request->id);
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
            $job->company_id = $request->company_id;
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
            return redirect('admin-panel/jobs/show');
        }
    
        // delete job
        public function delete(Request $request){
            $job = Job::find($request->id);
            $job->deleted = 1;
            $job->save();
            return redirect()->back();
        }

        public function getJobs(Request $request){
            $job_id = $request->job_id;
            $user_ids = RequestJob::where('job_id' , $job_id)->pluck('user_id');  
            $data['users'] = User::whereIn('id' , $user_ids)->get();
            return view('admin.requests' , ['data' => $data]);
        }


}