<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Lesson;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionImport;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lesson $lesson)
    {
        $questions = $lesson->questions;
        return view('admin.question.questions', compact('lesson', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lesson $lesson)
    {
        return view('admin.question.edit-question', compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lesson $lesson)
    {
        if ($request->hasFile('file')) {
            Excel::import(new QuestionImport(['lesson_id' => $lesson->id]), $request->file('file'));
            return redirect('/admin/'.$lesson->id.'/questions');
        } 

        $lesson->questions()->create([
            'name_ru' => $request->name_ru,
            'name_kz' => $request->name_kz,
            'name_en' => $request->name_en,
            'sort_num' => $request->sort_num
        ]);

        return redirect('/admin/'.$lesson->id.'/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function createExcel(Lesson $lesson)
    {
        return view('admin.question.question-excel', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson, Question $question)
    {
        return view('admin.question.edit-question', compact('lesson', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson, Question $question)
    {
        $question->update([
            'name_ru' => $request->name_ru,
            'name_kz' => $request->name_kz,
            'name_en' => $request->name_en,
            'sort_num' => $request->sort_num
        ]);

        return redirect('/admin/'.$lesson->id.'/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson, Question $question)
    {
        $question->delete();
        return true;
    }
}
