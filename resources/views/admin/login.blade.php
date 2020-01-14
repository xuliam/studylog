@extends('admin.guest')


@section('title')
    Admin Login
@endsection

@section('content')
    <div class="row">
        <div class="col-6 offset-3 mt-5 p-5 bg-white rounded">
            <h3>Admin Login</h3>

        <form method="post" action="{{route('admin.login')}}" >
            @csrf
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp">
                <small id="usernameHelp" class="form-text text-muted">We'll never share your information with anyone else.</small>
                <small class="form-text text-muted">
                    @error('username')
                     <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <small class="form-text" text-muted>
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>

    </div>
@endsection

