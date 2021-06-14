<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;
use App\User;
use Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($website)
    {
        return Socialite::driver($website)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($website)
    {
        if ($website == 'google') {
            $user = Socialite::driver($website)->stateless()->user();
        }else {
            $user = Socialite::driver($website)->user();
        }
        
        
        $userExistance = User::where('email', $user->email)->first();
        // dd($userExistance);
        $newUser = new User();
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->localId = $user->id;
        if (isset($userExistance['id'])) {
            Auth::guard('user')->login($userExistance);
            return redirect()->route('home');
        }else {
            $newUser->save();
            Auth::guard('user')->login($newUser);
            return redirect()->route('user.profile');
        }
        // dd($user);
        // $user->token;
    }
//   use AuthenticatesUsers;
//    protected $auth;
//    protected $redirectTo = RouteServiceProvider::HOME;
//    public function __construct(FirebaseAuth $auth) {
//       $this->middleware('guest')->except('logout');
//       $this->auth = $auth;
//    }

//     protected function login(Request $request) {
//       try {
//          $signInResult = $this->auth->signInWithEmailAndPassword($request['email'], $request['password']);
//          $user = new User($signInResult->data());
//          $result = Auth::guard('user')->login($user);
//          return redirect($this->redirectPath());
//       } catch (FirebaseException $e) {
//          throw ValidationException::withMessages([$this->username() => [trans('auth.failed')],]);
//       }
//    }
//    public function username() {
//       return 'email';
//    }

//    public function handleCallback(Request $request, $provider) {
//     $socialTokenId = $request->input('social-login-tokenId');
    
//     try {
//        $verifiedIdToken = $this->auth->verifyIdToken($socialTokenId);
//       // dd($verifiedIdToken->getClaim);
//        $user = new User();
//        $user->name = $verifiedIdToken->getClaim('name');
//        $user->email = $verifiedIdToken->getClaim('email');
//        $user->localId = $verifiedIdToken->getClaim('user_id');
//        $userAuth = User::where("localId", $user->localId)->select('id')->first();
//        if (isset($userAuth['id'])) {
//         Auth::guard('user')->login($user);
//         return redirect()->route('home');
//        }else {
//         $user->save();
//         Auth::guard('user')->login($user);
//         return redirect()->route('user.profile');
//        }
       
        
       
//     } catch (\InvalidArgumentException $e) {
//        return redirect()->route('login.user');
//     } catch (InvalidToken $e) {
//        return redirect()->route('login.user');
//     }
//  }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
            
        if (Auth::guard('user')->attempt($credentials)) {
          
            return redirect('/');
        }

        return redirect('/register')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function authenticateCompany(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
            
        if (Auth::guard('company')->attempt($credentials)) {
          
            return redirect('/');
        }

        return redirect('/register-companies')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
      Auth::guard('user')->logout();

      return redirect()->route('home');
    }

    public function logoutCompany() {
        Auth::guard('company')->logout();
  
        return redirect()->route('home');
      }
}