@extends('layouts.app')
@section('content')
    <div style="min-height: 100px">
        <h4 style="text-align: center">Список Категория</h4>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-6">
            <div class="row">
                <a class="form-control" style="text-align: center;" href="{{route('posts.create')}}">Создание post</a>
                <h4></h4>
                <a class="form-control" style="text-align: center;" href="{{route('create.category')}}">Создание категория</a>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-cente" style="text-align: center" >
        <div class="col-8">
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Category</th>
                        <th scope="col">Code Category</th>
                    </tr>
                    @foreach($categories as $category)
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td><a class="form-control" href="{{route('post.category',$category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->code}}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
