@extends('layouts.app')
@section('title')
    welcome
    @endsection

@section('content')
    content
    {!! config('project.admin.state')[1] !!}
    @endsection
