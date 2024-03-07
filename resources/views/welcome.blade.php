@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <a style="text-align: center" class="form-control" href="{{route('home.page')}}">Home</a>
            <a style="text-align: center" class="form-control" href="{{route('posts.create')}}">Post Create</a>
            <a style="text-align: center" class="form-control" href="{{route('create.category')}}">Category Create</a>
            <a style="text-align: center" class="form-control" href="{{route('index.category')}}">List Category</a>
            <a style="text-align: center" class="form-control" href="{{route('posts.index')}}">List Post</a>
        </div>
    </div>
@endsection
