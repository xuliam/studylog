<?php

namespace App\Http\Controllers;

use App\AdminUser;
use App\Http\Requests\AdminUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserDoController extends Controller
{
    public function index(AdminUser $adminUser)
    {
        $datas =$adminUser->orderBy('id', 'desc')->get();
        return view('admin.adminuser.menu', compact('datas'));
    }

    public function add()
    {

        return view('admin.adminuser.add');
    }

    public function save(AdminUserRequest $request, AdminUser $adminuser)
    {
        $data=$request->validated();
        $data['password']= Hash::make($data['password']);
        $data['state']= (int)true;

        $adminuser->create($data);

        alert('Success to add a new Admin');
        return redirect()->route('admin.adminuser');
    }

    public function remove()
    {

    }

    public function state()
    {

    }
}
