@extends('layouts.app')

@section('title')
    Admin Page
    @endsection

@section('sidebar')
    @include('admin.adminuser.index')
@endsection

@section('content')
    @page_title(['title'=>'Admin','comment'=>'Admin Management'])
    @endpage_title
@endsection
