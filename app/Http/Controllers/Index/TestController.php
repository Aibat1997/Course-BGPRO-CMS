<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\Lesson;
use App\Models\Answer;
use App\Models\UserLesson;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index(Question $question)
    {
        $old_answer = UserAnswer::where('user_id', Auth::user()->id)->where('question_id', $question->id)->where('is_active', 1)->first();
        return view('profile.test', compact('question', 'old_answer'));
    }

    public function userAnswer(Request $request, Question $question)
    {
        $lesson = $question->lesson;
        $next = $lesson->questions()->where('id', '>', $question->id)->orderBy('id')->first();

        if (!empty($request->answer)) {
            UserAnswer::updateOrCreate(
                ['user_id' => Auth::user()->id, 'question_id' => $question->id],
                ['answer_id' => $request->answer, 'is_active' => 1]
            );

            if (!is_null($next)) {
                return redirect("/lesson/$next->id/test");
            } else {
                return redirect('/finish/' . $lesson->id);
            }
        } elseif (!is_null($next)) {
            return redirect("/lesson/$next->id/test");
        } else {
            return redirect('/finish/' . $lesson->id);
        }
    }

    public function finish(Lesson $lesson)
    {
        $user_id = Auth::user()->id;
        $questions_array = $lesson->questions->pluck('id')->toArray();
        $answers_array = UserAnswer::where('user_id', $user_id)
            ->whereIn('question_id', $questions_array)
            ->where('is_active', 1)
            ->pluck('answer_id')
            ->toArray();

        $result = Answer::whereIn('id', $answers_array)->sum('is_correct');
        UserLesson::where('user_id', $user_id)->where('lesson_id', $lesson->id)->update(['test_result' => $result, 'status_id' => 3]);
        UserAnswer::where('user_id', $user_id)->whereIn('question_id', $questions_array)->update(['is_active' => 0]);

        return view('profile.finish', compact('lesson', 'result'));
    }
}
