<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Country;
use App\JobType;
use App\Qualification;
use App\Exam;

class CategoryController extends AdminController{

    // type : get -> to add new
    public function AddGet(){
        return view('admin.category_form');
    }

    // type : post -> add new category
    public function AddPost(Request $request){
        $image_name = $request->file('image')->getRealPath();
        Cloudder::upload($image_name, null);
        $imagereturned = Cloudder::getResult();
        $image_id = $imagereturned['public_id'];
        $image_format = $imagereturned['format'];    
        $image_new_name = $image_id.'.'.$image_format;
        $category = new Category();
        $category->image = $image_new_name;
        $category->title_en = $request->title_en;
        $category->title_ar = $request->title_ar;
        $category->save();
        return redirect('admin-panel/categories/show'); 
    }

    // get all categories
    public function show(){
        $data['categories'] = Category::where('deleted' , 0)->orderBy('id' , 'desc')->get();
        return view('admin.categories' , ['data' => $data]);
    }

    // get edit page
    public function EditGet(Request $request){
        $data['category'] = Category::find($request->id);
        return view('admin.category_edit' , ['data' => $data ]);
    }

    // edit category
    public function EditPost(Request $request){
        $category = Category::find($request->id);
        if($request->file('image')){
            $image = $category->image;
            $publicId = substr($image, 0 ,strrpos($image, "."));    
            Cloudder::delete($publicId);
            $image_name = $request->file('image')->getRealPath();
            Cloudder::upload($image_name, null);
            $imagereturned = Cloudder::getResult();
            $image_id = $imagereturned['public_id'];
            $image_format = $imagereturned['format'];    
            $image_new_name = $image_id.'.'.$image_format;
            $category->image = $image_new_name;
        }

        $category->title_en = $request->title_en;
        $category->title_ar = $request->title_ar;
        $category->save();
        return redirect('admin-panel/categories/show');
    }

    // delete category
    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->deleted = 1;
        $category->save();
        return redirect()->back();
    }


    public function AddGetCountry(){
        return view('admin.country_form');
    }

    public function AddGetJobType(){
        return view('admin.jobtype_form');
    }

    public function AddGetQualification(){
        return view('admin.qualification_form');
    }

    public function AddPostCountry(Request $request){
        $country = new Country();
        $country->name_ar = $request->name_ar;
        $country->name_en = $request->name_en;
        $country->save();
        return redirect('admin-panel/countries/show'); 
    }

    public function AddPostQualification(Request $request){
        $item = new Qualification();
        $item->title_ar = $request->title_ar;
        $item->title_en = $request->title_en;
        $item->save();
        return redirect('admin-panel/qualifications/show'); 
    }

    public function AddPostJobType(Request $request){
        $item = new JobType();
        $item->title_ar = $request->title_ar;
        $item->title_en = $request->title_en;
        $item->save();
        return redirect('admin-panel/job_types/show'); 
    }

    public function showCountry(){
        $data['items'] = Country::where('deleted' , 0)->orderBy('id' , 'desc')->get();
        return view('admin.countries' , ['data' => $data]);
    }

    public function showQualification(){
        $data['items'] = Qualification::where('deleted' , 0)->orderBy('id' , 'desc')->get();
        return view('admin.qualifications' , ['data' => $data]);
    }

    public function showJobType(){
        $data['items'] = JobType::where('deleted' , 0)->orderBy('id' , 'desc')->get();
        return view('admin.job_types' , ['data' => $data]);
    }

    public function deleteCountry(Request $request){
        $item = Country::find($request->id);
        $item->deleted = 1;
        $item->save();
        return redirect()->back();
    }

    public function deleteQualification(Request $request){
        $item = Qualification::find($request->id);
        $item->deleted = 1;
        $item->save();
        return redirect()->back();
    }

    public function deleteJobType(Request $request){
        $item = JobType::find($request->id);
        $item->deleted = 1;
        $item->save();
        return redirect()->back();
    }

    public function EditGetCountry(Request $request){
        $data['item'] = Country::find($request->id);
        return view('admin.country_edit' , ['data' => $data ]);
    }

    public function EditGetQualification(Request $request){
        $data['item'] = Qualification::find($request->id);
        return view('admin.qualification_edit' , ['data' => $data ]);
    }

    public function EditGetJobType(Request $request){
        $data['item'] = JobType::find($request->id);
        return view('admin.job_type_edit' , ['data' => $data ]);
    }


    public function EditPostCountry(Request $request){
        $item = Country::find($request->id);
        $item->name_ar = $request->name_ar;
        $item->name_en = $request->name_en;
        $item->save();
        return redirect('admin-panel/countries/show');
    }

    public function EditPostQualification(Request $request){
        $item = Qualification::find($request->id);
        $item->title_ar = $request->title_ar;
        $item->title_en = $request->title_en;
        $item->save();
        return redirect('admin-panel/qualifications/show');
    }

    public function EditPostJobType(Request $request){
        $item = JobType::find($request->id);
        $item->title_ar = $request->title_ar;
        $item->title_en = $request->title_en;
        $item->save();
        return redirect('admin-panel/job_types/show');
    }

    public function getexam(Request $request){
        $data['questions'] = Exam::where('category_id' , $request->id)->get();
        $data['category'] = Category::find($request->id);
        return view('admin.exams' , ['data' => $data ]);
    }

    public function getaddnewquestion(Request $request){
        $data['category_id'] = $request->id;
        return view('admin.question_form' , ['data' => $data ]);
    }

    public function postaddnewquestion(Request $request){
        $item = new Exam();
        $item->question_en = $request->question_en;
        $item->question_ar = $request->question_ar;
        
        $item->first_answer_en = $request->first_answer_en;
        $item->first_answer_ar = $request->first_answer_ar;

        $item->second_answer_en = $request->second_answer_en;
        $item->second_answer_ar = $request->second_answer_ar;

        if($request->third_answer_en){
            $item->third_answer_en = $request->third_answer_en;
        }
        if($request->third_answer_ar){
            $item->third_answer_ar = $request->third_answer_ar;
        }
        if($request->fourth_answer_en){
            $item->fourth_answer_en = $request->fourth_answer_en;
        }
        if($request->fourth_answer_ar){
            $item->fourth_answer_ar = $request->fourth_answer_ar;
        }
        $item->true_answer = $request->true_answer;

        $item->category_id = $request->category_id;
        

        $item->save();
        return redirect('admin-panel/categories/'.$request->category_id.'/exams'); 
    }

    public function geteditquestion(Request $request){
        $data['category_id'] = $request->id;
        $data['question'] = Exam::find($request->question_id);
        return view('admin.question_edit' , ['data' => $data ]);
    }

    public function posteditquestion(Request $request){
        $item =  Exam::find($request->question_id);
        $item->question_en = $request->question_en;
        $item->question_ar = $request->question_ar;
        
        $item->first_answer_en = $request->first_answer_en;
        $item->first_answer_ar = $request->first_answer_ar;

        $item->second_answer_en = $request->second_answer_en;
        $item->second_answer_ar = $request->second_answer_ar;

        if($request->third_answer_en){
            $item->third_answer_en = $request->third_answer_en;
        }
        if($request->third_answer_ar){
            $item->third_answer_ar = $request->third_answer_ar;
        }
        if($request->fourth_answer_en){
            $item->fourth_answer_en = $request->fourth_answer_en;
        }
        if($request->fourth_answer_ar){
            $item->fourth_answer_ar = $request->fourth_answer_ar;
        }
        $item->true_answer = $request->true_answer;

        $item->category_id = $request->category_id;
        

        $item->save();
        return redirect('admin-panel/categories/'.$request->category_id.'/exams'); 
    }

    public function deletequestion(Request $request){
        $item = Exam::find($request->question_id);
        $item->delete();
        return redirect()->back();
    }



    

}