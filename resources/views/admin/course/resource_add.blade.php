@extends('layouts.app')

@section('title')
    Resource - {{$chapter->title}} - {{$course->title}}
@endsection

@section('sidebar')
    @include('admin.course.menu')
@endsection

@section('content')
    @page_title(['title'=>'Resource Connection', 'comment'=>"manage your resource -  $chapter->title to $course->title"])
    <a href="{{route('admin.course.detail',[$course->id])}}" class='btn btn-primary btn-sm'>Back to Course</a>
    @endpage_title

    <div class="row">
        <div class="col-12">
            <table class="table table-sm">
                <thead class="thead-light">
                <tr>
                    <th scope="col" width="100">Resource ID</th>
                    <th scope="col" width="100">Sort</th>
                    <th scope="col">Resource Title</th>
                </tr>
                </thead>
                <tbody>
                <form action="{{route('admin.course.resource.add', [$course->id, $chapter->id])}}" method="post">
                    @csrf
                @foreach($chapter->resource as $resource)
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="resource_id[]" value="{{$resource->id}}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="sort[]" value="{{$resource->pivot->sort}}">
                        </td>
                        <td>
                            ({!! $resource->typeName !!})
                            <a href="{{route('admin.resource.add', [$resource->id])}}">
                                {{$resource->title}}
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr style="background: #f8f8f8">
                    <td>
                        <input type="text" class="form-control form-control-sm" name='resource_id[]' placeholder='Resource ID'>
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="sort[]" placeholder="Sort">
                    </td>
                    <td class="text-muted align-middle">
                        pls enter the resource id and sort sequice;
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="save" class="btn btn-sm btn-primary"/>
                    </td>
                </tr>

                </tbody>
            </table>
            </form>

        </div>
    </div>
@endsection
