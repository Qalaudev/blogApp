@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-6">
            <div class="row">
                <a class="form-control" style="text-align: center" href="{{route('posts.create')}}">Создание post</a>
                <h4></h4>
                <a class="form-control" style="text-align: center" href="{{route('create.category')}}">Создание категория</a>
                <table style="text-align: center;" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name Category</th>
                        <th scope="col">Code Category</th>
                    </tr>
                    @foreach($postByCategory as $post)
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
