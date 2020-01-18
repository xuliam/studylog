@extends('layouts.app')

@section('title')
    Admin Page
    @endsection

@section('sidebar')
    @include('admin.adminuser.index')
@endsection

@section('content')
    @page_title(['title'=>'Admin','comment'=>'Admin Management'])
    @endpage_title
{{--{{dump($data)}}--}}
    <table class="table table-striped">
        <thead class="bg-info">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">User State</th>
            <th scope="col">Creat Time</th>
            <th scope="col">Management</th>
        </tr>
        </thead>
        <tbody>
        @foreach($datas as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->username}}</td>
            <td>
                <a onclick="return confirm('Swift the status?')" href="{{route('admin.adminuser.state', [$data->id])}}" >{!! $data->stateText !!}</a>
            </td>
            <td>{{$data->created_at}}</td>
            <td>
                <a href="{{route('admin.adminuser.add', [$data->id])}}" class="btn btn-primary btn-sm">Modify</a>
                <a onclick="return confirm('Are you sure to Delete?')" href="{{route('admin.adminuser.remove', [$data->id])}}" class="btn btn-danger btn-sm">Delete </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
