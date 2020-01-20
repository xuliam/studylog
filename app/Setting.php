<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function foo\func;

class Setting extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'key', 'value', 'name', 'comment', 'sort'
    ];

    protected $kvs = null;

    public function kv()
    {
        if($this->kvs === null){
            $this->kvs = $this->orderBy('sort', 'asc')->get()->mapWithKeys(function ($item){
                return [
                    $item['key'] => $item['value']
                ];
            });
        }
        return $this->kvs;
    }
}
