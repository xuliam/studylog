<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceDoc extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'resource_id', 'content'
    ];
}
