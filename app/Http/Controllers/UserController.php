<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\User;
use App\Models\Quiz_topics;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(User $profile)
    {
        return view('/profile', ['quizCount' => $profile->profile()->count()]);
    }
    public function analysis(User $quizs)
    {
        $quiz = $quizs->profile()->latest()->paginate(4);
        return view(
            '/analytics',
            [
                'quizCount' => $quizs->profile()->count(),
                'quizs' => $quiz
            ]
        );
    }

    public function search($term)
    {
        $search = Quiz_topics::search($term)->get();
        return ($search);
    }
    public function updateProfilePicture(Request $request){
        $request->validate([
            'profile_picture'=> 'required|image|mimes:jpeg, png, jpg, gif|max:2048',
        ]);
        if ($request->hasFile('profile_picture')) {
            $destination_path = 'public/image';
            $avatar = $request->file('profile_picture');
            $avatar_name = $avatar->getClientOriginalName();
            $path = $request->file('profile_picture')->storeAs($destination_path, $avatar_name);
          }
          $user = auth()->user();
          $user->Avatar= $avatar_name;
          $user->save();

          return redirect()->back()->with('sucess', 'profile picture updated');
    }
}
