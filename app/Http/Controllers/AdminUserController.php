<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLogin;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function check(AdminLogin $request)
    {
        $data= $request->validated();
        $data['state']= (int)true;
        $is=Auth::guard('admin')->attempt($data);

        if(!$is){
            return back()->withErrors(['username'=>'The account is not available']);
        }
        return view('admin.show');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return view('admin.login');
    }

    public function show()
    {
        return view('admin.show');
    }


}

