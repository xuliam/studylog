<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'adminuser_id', 'type', 'title', 'desc'
    ];

    const VIDEO = 1;
    const DOC = 2;

    public function getTypeNameAttribute()
    {
        return config('project.resource.type')[$this->type];
    }

    public function adminUser()
    {
        return $this->belongsTo('App\AdminUser', 'adminuser_id');
    }

    public function video()
    {
        return $this->hasOne('App\ResourceVideo');
    }

    public function doc()
    {
        return $this->hasOne('App\ResourceDoc');
    }
}
