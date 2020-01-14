@extends('layouts.app')

@section('content')
  <?php
  dump(Auth::guard('admin')->user()->username);
    ?>
    @endsection
