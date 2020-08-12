<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        $answers = $question->answers;
        return view('admin.answer.answers', compact('question', 'answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question)
    {
        return view('admin.answer.edit-answer', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $question->answers()->create([
            'name_ru' => $request->name_ru,
            'name_kz' => $request->name_kz,
            'name_en' => $request->name_en,
            'is_correct' => $request->is_correct
        ]);

        return redirect('/admin/'.$question->id.'/answers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        return view('admin.answer.edit-answer', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $answer->update([
            'name_ru' => $request->name_ru,
            'name_kz' => $request->name_kz,
            'name_en' => $request->name_en,
            'is_correct' => $request->is_correct
        ]);

        return redirect('/admin/'.$question->id.'/answers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        $answer->delete();
        return true;
    }
}
