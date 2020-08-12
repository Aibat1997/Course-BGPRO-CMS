<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $casts = [
        'lang' => 'array'
    ];

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'course_id');
    }
}
