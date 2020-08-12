<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers;

class IndexController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $lessons = Lesson::all();
        $users = User::all();
        return view('admin.index', compact('courses', 'lessons', 'users'));
    }
}
