<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminUser extends Authenticatable
{
    use SoftDeletes;
    protected $fillable=[
        'username','password','state'
    ];

    public function getStateTextAttribute()
    {
        return config('project.admin.state')[$this->state];
    }
}
