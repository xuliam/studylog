<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
       return view('admin.setting.index');
    }

    public function save(Request $request)
    {

    }
}
