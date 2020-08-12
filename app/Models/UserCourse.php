<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourse extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
