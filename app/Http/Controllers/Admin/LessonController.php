<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $lessons = $course->lessons;
        return view('admin.lesson.lessons', compact('lessons', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('admin.lesson.edit-lesson', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $course->lessons()->create([
            'name_ru' => $request->name_ru,
            'name_kz' => $request->name_kz,
            'name_en' => $request->name_en,
            'content_ru' => $request->content_ru,
            'content_kz' => $request->content_kz,
            'content_en' => $request->content_en,
            'video_ru' => $request->video_ru,
            'video_kz' => $request->video_kz,
            'video_en' => $request->video_en,
            'sort_num' => $request->sort_num
        ]);

        return redirect('/admin/'.$course->id.'/lessons');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Lesson $lesson)
    {
        return view('admin.lesson.edit-lesson', compact('lesson', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $lesson->update([
            'name_ru' => $request->name_ru,
            'name_kz' => $request->name_kz,
            'name_en' => $request->name_en,
            'content_ru' => $request->content_ru,
            'content_kz' => $request->content_kz,
            'content_en' => $request->content_en,
            'video_ru' => $request->video_ru,
            'video_kz' => $request->video_kz,
            'video_en' => $request->video_en,
            'sort_num' => $request->sort_num
        ]);

        return redirect('/admin/'.$course->id.'/lessons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();
        return true;
    }
}
