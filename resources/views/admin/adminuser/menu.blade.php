@extends('layouts.app')

@section('title')
    Admin Page
    @endsection

@section('sidebar')
    @include('admin.adminuser.index')
@endsection

@section('content')
    list
    @endsection
