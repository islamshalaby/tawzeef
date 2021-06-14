<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ContactUs;
use App\User;

class HomeController extends AdminController{

    // get all contact us messages
    public function show(){
        $data['users'] = User::count();
        $data['visits'] = 10;
        $data['contact_us'] = ContactUs::count();
        return view('admin.home' , ['data' => $data]);   
    }

}