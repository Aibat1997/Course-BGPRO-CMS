<?php
namespace App\Imports;

use App\Models\Lesson;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class QuestionImport implements ToCollection
{
    private $lesson_id;

    public function __construct($data)
    {
        $this->lesson_id = $data['lesson_id'];
    }

    public function collection(Collection $rows)
    {
        $lesson = Lesson::find($this->lesson_id);
        $lesson->questions()->update(['q_is_active' => 0]);
        $sort_num = 0;

        foreach ($rows as $key => $row) {
            if (!is_null($row[0])) {
                if (Str::startsWith($row[0], '?')) {
                    $question_str = substr($row[0], 1);
                    $question_by_lang = explode("/", $question_str);
                    $question = $lesson->questions()->create([
                        'name_ru' => array_key_exists(0,$question_by_lang) ? $question_by_lang[0] : null,
                        'name_kz' => array_key_exists(1,$question_by_lang) ? $question_by_lang[1] : null,
                        'name_en' => array_key_exists(2,$question_by_lang) ? $question_by_lang[2] : null,
                        'sort_num' => ++$sort_num
                    ]);
                } elseif (Str::startsWith($row[0], '*')) {
                    $answer = substr($row[0], 1);
                    $answer_by_lang = explode("/", $answer);
                    $question->answers()->create([
                        'name_ru' => array_key_exists(0,$answer_by_lang) ? $answer_by_lang[0] : null,
                        'name_kz' => array_key_exists(1,$answer_by_lang) ? $answer_by_lang[1] : null,
                        'name_en' => array_key_exists(2,$answer_by_lang) ? $answer_by_lang[2] : null,
                        'is_correct' => 1,
                    ]);
                } else {
                    $answer_by_lang = explode("/", $row[0]);
                    $question->answers()->create([
                        'name_ru' => array_key_exists(0,$answer_by_lang) ? $answer_by_lang[0] : null,
                        'name_kz' => array_key_exists(1,$answer_by_lang) ? $answer_by_lang[1] : null,
                        'name_en' => array_key_exists(2,$answer_by_lang) ? $answer_by_lang[2] : null
                    ]);
                }
            }
        }
    }
}
