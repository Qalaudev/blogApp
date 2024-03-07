@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a class="form-control" style="text-align: center" href="{{route('posts.create')}}"> Создание Посты</a>
            <h4></h4>
            @foreach($posts as $post)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="">
                    <small>author:{{$post->user->name}}</small>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->content}}</p>
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
