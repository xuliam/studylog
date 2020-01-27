@extends('layouts.app')

@section('title')
    Courses Page
@endsection

@section('sidebar')
    @include('admin.course.menu')
@endsection

@section('content')
    @page_title(['title'=>'Course Management', 'comment'=>'manage your course'])
    @endpage_title

    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Pic</th>
                    <th scope="col">Class</th>
                    <th scope="col">Order</th>
                    <th scope="col">Create Time</th>
                    <th scope="col">Edit Time</th>
                    <th scope="col">Management</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course->id}}</th>
                    <th> <img src="{{$course->image_link}}" class="img-fluid" /> </th>
                    <td>{{$course->title}}</td>
                    <td>{{$course->sort}}</td>
                    <td>{{$course->created_at}}</td>
                    <td>{{$course->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.course.detail', [$course->id])}}" class="btn btn-sm btn-primary">Management</a>
                        <a href="{{route('admin.course.add', [$course->id])}}" class="btn btn-sm btn-secondary">Edit</a>
                        <a onclick="return confirm('Are you sure to delete?')" href="{{route('admin.course.remove', [$course->id])}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
