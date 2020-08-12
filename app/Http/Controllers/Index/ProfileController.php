<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\UserLesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Helpers;

class ProfileController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('profile.index', compact('courses'));
    }

    public function edit()
    {
        return view('profile.profile-edit');
    }

    public function changePassword()
    {
        return view('profile.change_password');
    }

    public function courses()
    {
        $courses = Course::all();
        return view('profile.user-courses', compact('courses'));
    }

    public function lesson(Lesson $lesson)
    {
        UserLesson::firstOrCreate(
            ['user_id' => Auth::user()->id, 'lesson_id' => $lesson->id],
            ['status_id' => 1]
        );

        return view('profile.lesson', compact('lesson'));
    }

    public function update(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $result = Helpers::storeImg('avatar', 'avatar', $request);
        }else {
            $result = Auth::user()->avatar;
        }

        Auth::user()->update([
           'name' => $request->name,
           'email' => $request->email,
           'avatar' =>  $result
        ]);

        return redirect()->back()->with('success', 'Успешно сохраненно');
    }

    public function profileChangePassword(Request $request)
    {
        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            if (Str::is($request->password, $request->confirm_password)) {
                $user->update(['password' => Hash::make($request->password)]);
                return redirect()->back()->with('success', 'Успешно сохраненно');
            }else {
                return redirect()->back()->withErrors('Пароли не совпадают');
            }
        }
    }
}
