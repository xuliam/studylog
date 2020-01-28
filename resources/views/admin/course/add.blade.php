@extends('layouts.app')

@section('title')
    Courses Page
@endsection

@section('sidebar')
    @include('admin.course.menu')
@endsection

@section('content')
    @page_title(['title'=>'Course Add', 'comment'=>'manage your course'])
    @endpage_title

    <div class="row">
        <div class="col-12">

            <form method="post" action="{{route('admin.course.add', [$course->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title', $course->title)}}">
                        @error('title')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="desc" name="desc" value="{{old("desc", $course->desc)}}">
                        @error('desc')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sort</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sort" name="sort" value="{{old("sort", $course->sort)}}">
                        @error('sort')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pic</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control-file" name="image">
                        @error('image')
                        <small class="form-text text-danger">{{$message}}</small>
                        @else
                            <small class="form-text text-muted">suggest to upload size 800*600</small>
                        @enderror
                    </div>
                    <div class="col-2"><img src="{{$course->image_link}}" class="img-fluid"/></div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
