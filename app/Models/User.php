<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Course;
use App\Models\UserLesson;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lesson($lesson_id)
    {
        return UserLesson::where('user_id', $this->id)->where('lesson_id', $lesson_id)->first();
    }

    public function coursePassedlessons($course_id)
    {
        $lessons = Course::find($course_id)->lessons()->pluck('id')->toArray();
        return UserLesson::where('user_id', $this->id)->whereIn('lesson_id', $lessons)->get();
    }
}
