<?php

namespace App\Http\Controllers;

use App\Models\Quiz_category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SignupController extends Controller
{
  public function logout()
  {
    auth()->logout();
  }
  public function dashboard()
  {
    return view('/userdashboard', ['category' => Quiz_category::all()]);
  }
  public function login(Request $request)
  {
    $incomingFields = $request->validate([
      'email' => 'required|email',
      'Password' => 'required|',
    ]);
    $remember_me = $request->has('remember_me') ? true : false;
    if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['Password']], $remember_me)) {
      $request->session()->regenerate();
      return redirect('/userdashboard');
    } else {
      return back()->with('fail', "Incorrect Password or Username");
    }
  }
  public function register(Request $request)
  {

    $incomingFields =  $request->validate([
      'Fullname' => 'required',
      'email' => ['required', 'email', Rule::unique('users', 'email')],
      'Username' => ['required', Rule::unique('users', 'Username')],
      'Password' => 'required|min:8|max:12',
    ]);
    $avatar_name = 'avatar.jpg';
    $incomingFields['password'] = bcrypt($incomingFields['Password']);
    if ($request->hasFile('avatar')) {
      $destination_path = 'public/image';
      $avatar = $request->file('avatar');
      $avatar_name = $avatar->getClientOriginalName();
      $path = $request->file('avatar')->storeAs($destination_path, $avatar_name);
    }

    $incomingFields['Avatar'] = $avatar_name;
    $user  = User::create($incomingFields);
    auth()->login($user);
    return redirect('/userdashboard');
    //           $user = User::create([
    //               'Fullname'=>$request->Fullname,
    //               'email'=>$request->email,
    //               'Username'=>$request->Username,
    //               'password'=>Hash::make($request->Password,),
    //               'Avatar'=>$avatar_name

    //           ]);
    //           if($user){
    //             return back()->with('sucess','Your account have been created successfully, please proceed to login');
    //           }else{
    //               return back()->with('fail', 'Something went wrong, try again later');
    //           }
    //   }
    //   function check(Request $request){
    //     $request->validate([
    //       'email'=>'required|email',
    //       'Password'=>'required|min:5|max:12'
    //     ]);
    //     $userinfo = User::where('email', '=', $request->email)->first();
    //     if(!$userinfo){
    //       return back()->with('fail', "This user does not exist");
    //     }else{
    //       if(Hash::check($request->Password, $userinfo->password)){
    //                $request->session()->put('LoggedUser', $userinfo->id);
    //                return redirect('/userdashboard');
    //       }else{
    //           return back()->with('fail', 'Incorrect password');
    //       }
    //     }
    //   }


  }
}
