@extends('layouts.app')

@section('title')
    System Setting
@endsection

@section('sidebar')
    @include('admin.setting.menu')
@endsection

@section('content')
    @page_title(['title'=>'System Setting','comment'=>'To set your system'])
    @endpage_title

@endsection
