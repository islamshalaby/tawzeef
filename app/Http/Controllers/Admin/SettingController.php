<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use App\Setting;

class SettingController extends AdminController{
    
    // get setting
    public function GetSetting(){
        $data['setting'] = Setting::find(1);
        return view('admin.setting' , ['data' => $data]);
    }

    // post setting
    public function PostSetting(Request $request){
        $setting = Setting::find(1);
        if($request->file('logo')){
            $logo = $setting->logo;
            $publicId = substr($logo , 0 , strrpos($logo , "."));
            if(!empty($setting->logo)) {
                Cloudder::delete($publicId);
            }
            $logo_name = $request->file('logo')->getRealPath();
            Cloudder::upload($logo_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $setting->logo = $logo_new_name;    
        }
        if($request->file('contact_image')){
            $logo = $setting->contact_image;
            $publicId = substr($logo , 0 , strrpos($logo , "."));
            if(!empty($setting->contact_image)) {
                Cloudder::delete($publicId);
            }
            $logo_name = $request->file('contact_image')->getRealPath();
            Cloudder::upload($logo_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $setting->contact_image = $logo_new_name;    
        }
        if($request->file('home_image')){
            $home_image = $setting->home_image;
            $publicId = substr($home_image , 0 , strrpos($home_image , "."));
            if(!empty($setting->home_image)) {
                Cloudder::delete($publicId);
            }
            
            
            $home_image_name = $request->file('home_image')->getRealPath();
            Cloudder::upload($home_image_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $setting->home_image = $logo_new_name;    
        }
        if($request->file('jobs_image')){
            $jobs_image = $setting->jobs_image;
            $publicId = substr($jobs_image , 0 , strrpos($jobs_image , "."));
            if(!empty($setting->jobs_image)) {
                Cloudder::delete($publicId);
            }
            $home_image_name = $request->file('jobs_image')->getRealPath();
            Cloudder::upload($home_image_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $setting->jobs_image = $logo_new_name;    
        }
        if($request->file('footer_logo')){
            $footer_logo = $setting->footer_logo;
            $publicId = substr($footer_logo , 0 , strrpos($footer_logo , "."));
            if(!empty($setting->footer_logo)) {
                Cloudder::delete($publicId);
            }
            $home_image_name = $request->file('footer_logo')->getRealPath();
            Cloudder::upload($home_image_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $setting->footer_logo = $logo_new_name;    
        }
        if($request->file('companies_image')){
            $companies_image = $setting->companies_image;
            $publicId = substr($companies_image , 0 , strrpos($companies_image , "."));
            if(!empty($setting->companies_image)) {
                Cloudder::delete($publicId);
            }
            $home_image_name = $request->file('companies_image')->getRealPath();
            Cloudder::upload($home_image_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $setting->companies_image = $logo_new_name;    
        }
        if($request->file('job_image')){
            $job_image = $setting->job_image;
            $publicId = substr($job_image , 0 , strrpos($job_image , "."));
            if(!empty($setting->job_image)) {
                Cloudder::delete($publicId);
            }
            $home_image_name = $request->file('job_image')->getRealPath();
            Cloudder::upload($home_image_name , null);
            $logoreturned = Cloudder::getResult();
            $logo_id = $logoreturned['public_id'];
            $logo_format = $logoreturned['format'];
            $logo_new_name = $logo_id.'.'.$logo_format;
            $setting->job_image = $logo_new_name;
        }
        $setting->app_name_en = $request->app_name_en;
        $setting->app_name_ar = $request->app_name_ar;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->app_phone = $request->app_phone;
        $setting->address_en = $request->address_en;
        $setting->address_ar = $request->address_ar;
        $setting->app_name_ar = $request->app_name_ar;
        $setting->facebook = $request->facebook;
        $setting->youtube = $request->youtube;
        $setting->twitter = $request->twitter;
        $setting->instegram = $request->instegram;
        $setting->snap_chat = $request->snap_chat;
        $setting->map_url = $request->map_url;
        $setting->latitude = $request->latitude;
        $setting->longitude = $request->longitude;
        $setting->text_one = $request->text_one;
        $setting->text_two = $request->text_two;
        $setting->text_three = $request->text_three;
        $setting->footer_text = $request->footer_text;
        $setting->text_one_en = $request->text_one_en;
        $setting->text_two_en = $request->text_two_en;
        $setting->text_three_en = $request->text_three_en;
        $setting->footer_text_en = $request->footer_text_en;
        $setting->save();
        return  back();
    }
}