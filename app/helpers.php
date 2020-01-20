<?php
function alert($msg, $type='success')
{
    session()->flash($type, $msg);
}

function setting($key){
    $data = app('App\Setting')->kv();
    return $data[$key];
}
