<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Setting;
use App\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  public function register()
  {
    $data['categories'] = Category::where('deleted', 0)->get();
    $data['setting'] = Setting::where('id', 1)->first();
    $data['countries'] = Country::where('deleted', 0)->get();
    return view('register', ['data' => $data]);
  }

  public function registerCompany()
  {
    $data['categories'] = Category::where('deleted', 0)->get();
    $data['setting'] = Setting::where('id', 1)->first();
    $data['countries'] = Country::where('deleted', 0)->get();
    return view('register_company', ['data' => $data]);
  }

  public function storeUser(Request $request)
  {
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|unique:users',
        'password' => 'required|string|min:6',
        'category_id' => 'required',
        'g-recaptcha-response' => 'required'
      ]);

    if ($validator->fails()) {
      $data = [];
      $data['errors'] = $validator->getMessageBag()->toArray();
      $data['success'] = 0;
      $data['recaptch'] = $request->input('g-recaptcha-response');
      return response($data, 200);
    }

      // User::create([
      //     'name' => $request->name,
      //     'email' => $request->email,
      //     'password' => Hash::make($request->password),
      //     'phone' => $request->phone,
      //     'category_id' => $request->category_id,
      //     'step' => 1
      // ]);
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->phone = $request->phone;
      $user->category_id = $request->category_id;
      $user->save();
      

      Auth::guard('user')->login($user);

      $data = $user;
      $data['success'] = 1;
      return response($data, 200);
  }

  public function verifyPhone(Request $request) {
    $user = User::find($request->user_id);
    // dd($request->all());
    $user->verified = $request->verified;
    $user->save();

    return redirect()->route('user.profile');
  }

}





