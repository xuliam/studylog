@extends('layouts.app')

@section('title')
    Course Management - {{$course->title}}
@endsection

@section('sidebar')
    @include('admin.course.menu')
@endsection

@section('content')
    @page_title(['title'=>'Course Management', 'comment'=>" Class For 「 {$course->title} 」"])
    @endpage_title

    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('admin.course.chapter.add', [$course->id , $chapter->id])}}" >
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title', $chapter->title)}}">
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descritionforcourse">Description</label>
                    <input type="text" class="form-control" name="desc" value="{{old('desc', $chapter->desc)}}" id="descritionforcourse">
                    @error('desc')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sort">sort</label>
                    <input type="text" class="form-control" name="sort" value="{{old('sort', $chapter->sort)}}" id="sort">
                    @error('sort')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
