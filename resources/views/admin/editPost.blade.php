@extends('layouts.adm')
@extends('css')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-6">
            <div class="row">
                <form action="{{ route('adm.management.postUpdate',$post->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="title">Title:</label><br>
                    <input class="form-control" type="text" id="title" name="title" required value="{{$post->title}}"><br>
                    <label for="content">Content:</label><br>
                    <textarea class="form-control" id="content" name="content" required>{{$post->content}}</textarea><br>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option @if($category->id == $post->category_id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <button class="btn btn-success form-control" type="submit">Update Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
