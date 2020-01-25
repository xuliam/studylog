@extends('layouts.app')

@section('title')
    Add Resources
@endsection

@section('sidebar')
    @include('admin.resource.menu')
@endsection

@section('content')
    @page_title(['title'=>'Resource','comment'=>'Resource Management'])
    @endpage_title

    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('admin.resource.add', [$resource->id] )}}">
                @csrf
                <div class="form-group row">
                    <div class="col-2">
                        <label for="formGroupExampleInput">Resource Type :</label>
                    </div>
                    <div class="col-10">
                        {!! config('project.resource.type')[$type] !!}
                        <input type="hidden" name="type" value="{{$type}}"/>
                        @error('type')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Title</label>
                    <input type="text" name="title" class="form-control" id="formGroupExampleInput2" value="{{old("title", $resource->title)}}">
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput3">Description</label>
                   <textarea class="form-control" name="desc" id="formGroupExampleInput3" cols="30" rows="2">{{old("desc", $resource->desc)}}</textarea>
                    @error('desc')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @if($type==\App\Resource::VIDEO)
                    @include('admin.resource.add_video')
                @endif
                @if($type==\App\Resource::DOC)
                    @include('admin.resource.add_doc')
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Confirm</button>
                </div>


            </form>

        </div>
    </div>




@endsection
