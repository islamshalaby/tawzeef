<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Company;
use App\Category;
use App\Country;

class CompanyController extends AdminController{
    public function AddGet(){
        $data['categories'] = Category::where('deleted' , 0)->get();
        $data['countries'] = Country::where('deleted' , 0)->get();        
        return view('admin.company_form' , ['data' => $data]);
    }

        // type : post -> add new company
        public function AddPost(Request $request){
            $image_name = $request->file('image')->getRealPath();
            Cloudder::upload($image_name, null);
            $imagereturned = Cloudder::getResult();
            $image_id = $imagereturned['public_id'];
            $image_format = $imagereturned['format'];    
            $image_new_name = $image_id.'.'.$image_format;
            $company = new Company();
            $company->image = $image_new_name;
            $company->name_ar = $request->name_ar;
            $company->name_en = $request->name_en;
            $company->email = $request->email;
            $company->website = $request->website;
            $company->category_id = $request->category_id;
            $company->country_id = $request->country_id;
            $company->description_ar = $request->description_ar;
            $company->description_en = $request->description_en;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->address_en = $request->address_en;
            $company->password = Hash::make($request->password);
            if($request->facebook){
                $company->facebook = $request->facebook;
            }

            if($request->twitter){
                $company->twitter = $request->twitter;
            }

            if($request->linkedin){
                $company->linkedin = $request->linkedin;
            }

            if($request->youtube){
                $company->youtube = $request->youtube;
            }
            
            $company->save();
            return redirect('admin-panel/companies/show'); 
        }
    
        // get all companies
        public function show(){
            $data['companies'] = Company::where('deleted' , 0)->orderBy('id' , 'desc')->get();
            return view('admin.companies' , ['data' => $data]);
        }
    
        // get edit page
        public function EditGet(Request $request){
            $data['company'] = Company::find($request->id);
            $data['categories'] = Category::where('deleted' , 0)->get();
            $data['countries'] = Country::where('deleted' , 0)->get();  
            return view('admin.company_edit' , ['data' => $data ]);
        }
    
        // edit company
        public function EditPost(Request $request){
            $company = Company::find($request->id);
            if($request->file('image')){
                $image = $company->image;
                $publicId = substr($image, 0 ,strrpos($image, "."));    
                Cloudder::delete($publicId);
                $image_name = $request->file('image')->getRealPath();
                Cloudder::upload($image_name, null);
                $imagereturned = Cloudder::getResult();
                $image_id = $imagereturned['public_id'];
                $image_format = $imagereturned['format'];    
                $image_new_name = $image_id.'.'.$image_format;
                $company->image = $image_new_name;
            }
    
            $company->name_ar = $request->name_ar;
            $company->name_en = $request->name_en;
            $company->email = $request->email;
            $company->website = $request->website;
            $company->category_id = $request->category_id;
            $company->country_id = $request->country_id;
            $company->description_ar = $request->description_ar;
            $company->description_en = $request->description_en;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->address_en = $request->address_en;
            if($request->password) {
                $company->password = Hash::make($request->password);
            }
            if($request->facebook){
                $company->facebook = $request->facebook;
            }

            if($request->twitter){
                $company->twitter = $request->twitter;
            }

            if($request->linkedin){
                $company->linkedin = $request->linkedin;
            }

            if($request->youtube){
                $company->youtube = $request->youtube;
            }
            $company->save();
            return redirect('admin-panel/companies/show');
        }
    
        // delete company
        public function delete(Request $request){
            $company = Company::find($request->id);
            $company->deleted = 1;
            $company->save();
            return redirect()->back();
        }
}