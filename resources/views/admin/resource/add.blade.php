@extends('layouts.app')

@section('title')
    Add Resources
@endsection

@section('sidebar')
    @include('admin.resource.menu')
@endsection

@section('content')
    @page_title(['title'=>'Video','comment'=>'Video Management'])
    @endpage_title

    @if($type==\App\Resource::VIDEO)
        @include('admin.resource.add_video')
    @endif
      @if($type==\App\Resource::DOC)
        @include('admin.resource.add_doc')
    @endif

@endsection
