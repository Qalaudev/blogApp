@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a class="btn btn-info btn-block mb-3" href="{{ route('posts.create') }}">Создание Посты</a>
            @foreach($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="" alt="{{$post->image}}">
                        <div class="card-body">
                            <small>author: {{$post->user->name}}</small>
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->content}}</p>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
