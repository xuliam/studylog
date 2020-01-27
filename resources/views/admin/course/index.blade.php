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
    @endsection
