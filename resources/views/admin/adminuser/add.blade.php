@extends('layouts.app')

@section('title')
    Admin Page - Add
@endsection

@section('sidebar')
    @include('admin.adminuser.index')
@endsection

@section('content')
    @page_title(['title'=>'Admin ADD','comment'=>'Admin Management'])
    @endpage_title
<div class="row" >
    <div class="container">
        <form method="post" action="{{route('admin.adminuser.add')}}" >
            @csrf
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" name = "username" value='{{old("username", $adminuser->username)}}' class="form-control" id="username">
                    @error("username")
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name = "password" class="form-control" id="inputPassword">
                    @error("password")
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name = "confirmpassword" class="form-control" id="inputConfirmPassword">
                </div>
            </div>

            <div class="form-group row ml-2">
                <div class="offset-sm-2">
                    <button type="submit" class="btn btn-primary ">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>


    @endsection
