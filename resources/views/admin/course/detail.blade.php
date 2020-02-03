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

    @foreach($course->chapter()->with('resource')->get() as $chapter)
    <div class="row">
        <div class="col-12">
            <div class="d-flex mb-2">
                <h5 class="m-0 p-0">({{$chapter->sort}}) {!! $chapter->title !!}  </h5>
                <small class="text-muted mr-auto pl-2 align-middle" style="margin:auto 0;">
                    {{$chapter->desc}}
                </small>
                <a href="{{route('admin.course.chapter.add', [ $course->id, $chapter->id ])}}" class="btn btn-primary btn-sm mb-1 mr-1">Edit</a>
                <a href="{{route('admin.course.resource.add', [$course->id, $chapter->id])}}" class="btn btn-success btn-sm mb-1 mr-1">Resc</a>
                <a href="{{route('admin.course.chapter.remove', [$course->id, $chapter->id])}}" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Are you sure to delete?')">Delete</a>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-sm">
                @foreach($chapter->resource as $resource)
                <tr>
                    <th width="100">{{$resource->id}}</th>
                    <th width="100">{!! $resource->typeName !!}</th>
                    <td>
                        <a href="{{route('admin.resource.add', [$resource->id])}}">{{$resource->title}}</a>
                    </td>
                </tr>
                    @endforeach
            </table>

        </div>
    </div>
    @endforeach
@endsection
