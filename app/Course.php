<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'adminuser_id', 'title', 'desc', 'image', 'sort'
    ];

    public function getImageLinkAttribute()
    {
        if(empty($this->image)){
            return asset('images/images.jpeg');
        }
        return asset('storage/'.$this->image);
    }
}
