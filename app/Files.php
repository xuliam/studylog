<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends Model
{
    use SoftDeletes;
    protected $fillable = ['adminuser_id', 'filetype', 'filepath', 'client_filename', 'fileext', 'filesize'];
}
