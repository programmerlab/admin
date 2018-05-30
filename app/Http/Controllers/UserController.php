<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
   
    public function googleLogin(Request $request)  {
        $google_redirect_url = route('google');
        $gClient = new \Google_Client();
        $gClient->setApplicationName('vendimation');
        $gClient->setClientId('834953885970-i7l2mv64qlkldlqp38iodbg9v97ed827.apps.googleusercontent.com');
        $gClient->setClientSecret('h_chgtmW8XEa6ceV5mu69js8');
        $gClient->setRedirectUri($google_redirect_url);
       // $gClient->setDeveloperKey(config('services.google.api_key'));
        $gClient->setScopes(array(
            'https://www.googleapis.com/auth/plus.me',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile',
        ));
        $google_oauthV2 = new \Google_Service_Oauth2($gClient);
        if ($request->get('code')){
            $gClient->authenticate($request->get('code'));
            $request->session()->put('token', $gClient->getAccessToken());
        }
        if ($request->session()->get('token'))
        {
            $gClient->setAccessToken($request->session()->get('token'));
        }
       
        if ($gClient->getAccessToken())
        {
            //For logged in user, get details from google using access token
            $guser = $google_oauthV2->userinfo->get();  
             
            $email      =   $guser->email;  
            $givenName  =   $guser->givenName;
            $picture    =   $guser->picture;
            $gender     =   $guser->gender;

                $request->session()->put('name', $guser['name']);
                if ($user =User::where('email',$guser['email'])->first())
                {
                    //logged your user via auth login
                }else{
                    //register your user with response data
                }               
            dd($guser);      
        } else
        {
            //For Guest user, get google login url
                $authUrl = $gClient->createAuthUrl();
               
                return redirect()->to($authUrl);
            }
        }
    public function listGoogleUser(Request $request){
      $users = User::orderBy('id','DESC')->paginate(5);
     return view('users.list',compact('users'))->with('i', ($request->input('page', 1) - 1) * 5);;
    }
}