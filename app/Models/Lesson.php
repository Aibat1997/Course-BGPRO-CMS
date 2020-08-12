<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'lesson_id')->where('q_is_active', 1);
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
