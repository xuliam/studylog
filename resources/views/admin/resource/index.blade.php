@extends('layouts.app')

@section('title')
    Resources List
@endsection

@section('sidebar')
    @include('admin.resource.menu')
@endsection

@section('content')
    <div class="mt-3">
        @page_title(['title'=>'Video','comment'=>'Video Management'])
        @endpage_title
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <form method="get" action="{{route('admin.resource')}}">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <input type="text" class="form-control mb-2" id="searchbytitle" name="keyword" placeholder="Search Title" value="{{$search->keyword ?? ''}}">
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control mb-2" id="searchbyauthor" name="adminuser_id" placeholder="Search Author ID" value="{{$search->adminuser_id ?? ""}}">
                    </div>


                    <div class="col-auto">
                        @foreach(config('project.resource.type') as $key=>$value)
                            <div class="form-check mb-2 form-check-inline align-middle">
                                <label class="form-check-label" for="autoSizingCheck">

                                    @if(!$search->type)
                                        <input class="form-check-input" type="checkbox" name="type[{{$key}}]" value="{{$key}}" checked>{!! $value !!}
                                    @else
                                        <input class="form-check-input" type="checkbox" name="type[{{$key}}]" value="{{$key}}" {{isset($search->type[$key]) ? 'checked' : ''}}>{!! $value !!}
                                </label>
                                    @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Author</th>
                    <th scope="col">Type</th>
                    <th scope="col">Title</th>
                    <th scope="col">Create Time</th>
                    <th scope="col">Management</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as $data)
                <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->adminUser->username ??'-/-'}}</td>
                    <td>{!! $data->type_name !!}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <a href="{{route('admin.resource.add', [ $data->id])}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are your sure to Delete?')">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
                {{ $datas->appends(request()->all())->links() }}
        </div>
    </div>


    @endsection
