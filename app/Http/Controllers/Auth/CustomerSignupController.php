<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Carbon\Carbon;
use App\User;
use App\UserToken;
use App\Additional;
use Illuminate\Http\Request;
use App\Mail\CustomerWelcome;
use App\Mail\YourReminder;
use Facades\App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CustomerSignupController extends Controller
{
    public $data = [];

	public function signupRules()
    {
        return [
                 "name" => "required",
                 "email" => "required|unique:users",
                 "password" => "required|confirmed|min:6",
                 "password_confirmation" => "required"
        ];
    }

	public function signup()
	{
		if(request()->isMethod("post"))
		{

			$this->validate(request(), $this->signupRules());

			try
            {

                $user = new User;
                $user->fill(request()->toArray());
                $user->password = bcrypt(request()->password);
                $user->save();
                $user->roles()->attach(2);
                $token = Common::createToken();
                UserToken::create(["user_id" => $user->id, "token" => $token, "type" => 'userConfirmation']);

                //Mail
                $welcomeMail = [$user->email, 'jackpotsoftware@gmail.com'];

               Mail::to($email)->send(new YourReminder);
                
                Auth::login($user);

                session()->flash("redirected", route('dashboard'));
                
                return redirect()->route("thanks");
            }
            catch(\Exception $ex)
            {
                return redirect()->back();
            }
		}
		else
		{
            //$this->data['schools'] = Additional::whereType('school')->get();
			return view('auth.register', $this->data);
		}
	}


    public function resendMail()
    {

        $user = auth()->user()->getUser();

        $token = Common::createToken();
        UserToken::create(["user_id" => $user->id, "token" => $token, "type" => 'userConfirmation']);

        Mail::to($user->email)->send(new EmployerWelcome($user, $token));

        session()->flash("success", "Please check your email verify email confirmation setup.");

        return back();

    }

}
