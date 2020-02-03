<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use SoftDeletes;
    protected $fillable = ['course_id', 'title', 'desc', 'sort'];

    public function resource()
    {
        return $this->belongsToMany('App\Resource', 'chapter_resources')->orderBy('sort', 'asc')
            ->withPivot('sort')
            ->withTimestamps();
    }
}
