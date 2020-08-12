<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Helpers;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.courses', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.edit-course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $result = Helpers::storeImg('image', 'image', $request);
        }

        $lang = array();
        if (!is_null($request->name_ru)){
            array_push($lang, "ru");
        }
        if (!is_null($request->name_kz)){
            array_push($lang, "kz");
        }
        if (!is_null($request->name_en)){
            array_push($lang, "en");
        }

        Course::create([
            'name_ru' => $request->name_ru,
            'name_kz' => $request->name_kz,
            'name_en' => $request->name_en,
            'image' => $result,
            'price' => $request->price,
            'lang' => $lang
        ]);

        return redirect('/admin/courses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit-course', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $result = $course->image;

        if ($request->hasFile('image')) {
            $result = Helpers::storeImg('image', 'image', $request);
        }

        $lang = array();
        if (!is_null($request->name_ru)){
            array_push($lang, "ru");
        }
        if (!is_null($request->name_kz)){
            array_push($lang, "kz");
        }
        if (!is_null($request->name_en)){
            array_push($lang, "en");
        }

        $course->update([
            'name_ru' => $request->name_ru,
            'name_kz' => $request->name_kz,
            'name_en' => $request->name_en,
            'image' => $result,
            'price' => $request->price,
            'lang' => $lang
        ]);

        return redirect('/admin/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->lessons()->delete();
        $course->delete();
        return true;
    }
}
