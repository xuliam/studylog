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
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
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
