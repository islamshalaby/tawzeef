<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use App\WebsiteAd;

class WebsiteAdController extends AdminController{
    // add get 
    public function AddGet(){
        return view('admin.website_ad_form');
    }

    // add post
    public function AddPost(Request $request){
        
        $image_name = $request->file('image')->getRealPath();
        Cloudder::upload($image_name, null);
        $imagereturned = Cloudder::getResult();
        $image_id = $imagereturned['public_id'];
        $image_format = $imagereturned['format'];    
        $image_new_name = $image_id.'.'.$image_format;
        $ad = new WebsiteAd();
        $ad->image = $image_new_name;
        $ad->content = $request->content;
        $ad->place = $request->place;
        $ad->save();
        return redirect('admin-panel/website_ads'); 
    }

    // get all ads
    public function show(Request $request){
        $data['ads'] = WebsiteAd::orderBy('id' , 'desc')->get();
        return view('admin.website_ads' , ['data' => $data]);
    }

    // get edit page
    public function EditGet(Request $request){
        $data['ad'] = WebsiteAd::find($request->id);
        return view('admin.website_ad_edit' , ['data' => $data]);
    }

    // post edit ad
    public function EditPost(Request $request){
        $ad = WebsiteAd::find($request->id);
        if($request->file('image')){
            $image = $ad->image;
            $publicId = substr($image, 0 ,strrpos($image, "."));    
            Cloudder::delete($publicId);
            $image_name = $request->file('image')->getRealPath();
            Cloudder::upload($image_name, null);
            $imagereturned = Cloudder::getResult();
            $image_id = $imagereturned['public_id'];
            $image_format = $imagereturned['format'];    
            $image_new_name = $image_id.'.'.$image_format;
            $ad->image = $image_new_name;
        }
        $ad->content = $request->content;
        $ad->place = $request->place;
        $ad->save();
        return redirect('admin-panel/website_ads');
    }

    public function details(Request $request){
        $data['ad'] = WebsiteAd::find($request->id);
        return view('admin.website_ad_details' , ['data' => $data]);
    }

    public function delete(Request $request){
        $ad = WebsiteAd::find($request->id);
        if($ad){
            $ad->delete();
        }
        return redirect('admin-panel/website_ads/show');
    }
}