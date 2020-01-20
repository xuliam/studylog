@extends('layouts.app')

@section('title')
    Resources List
@endsection

@section('sidebar')
    @include('admin.resource.menu')
@endsection

@section('content')
    @page_title(['title'=>'Video','comment'=>'Video Management'])
    @endpage_title


    @endsection
