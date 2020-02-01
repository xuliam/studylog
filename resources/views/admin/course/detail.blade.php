@extends('layouts.app')

@section('title')
    {{$course->title}} - Manage class
@endsection

@section('sidebar')
    @include('admin.course.menu')
@endsection

@section('content')
    @page_title(['title'=>'Course Detail', 'comment'=>" Class 「 {$course->title} 」"])
    <a href="{{route('admin.course.chapter.add', [$course->id])}}" class="btn btn-primary btn-sm">Add chapter</a>
    @endpage_title

    <div class="row">
        <div class="col-12">
            <div class="d-flex mb-2">
                <h5 class="m-0 p-0">(no) title  </h5>
                <small class="text-muted mr-auto pl-2 align-middle" style="margin:auto 0;">
                    Class Description
                </small>
                <a href="#" class="btn btn-primary btn-sm mb-1 mr-1">Edit</a>
                <a href="#" class="btn btn-success btn-sm mb-1 mr-1">Resc</a>
                <a href="#" class="btn btn-danger btn-sm mb-1">Delete</a>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-sm">
                <tr>
                    <th width="100">Resource ID</th>
                    <th width="100">Resource type</th>
                    <td><a href="#">Resource title</a></td>
                </tr>
                <tr>
                    <th width="100">Resource ID</th>
                    <th width="100">Resource type</th>
                    <td><a href="#">Resource title</a></td>
                </tr>
                <tr>
                    <th width="100">Resource ID</th>
                    <th width="100">Resource type</th>
                    <td><a href="#">Resource title</a></td>
                </tr>

            </table>

        </div>
    </div>
@endsection
