@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="col-6">
        <div class="row">
            <a class="btn btn-info" href="{{route('posts.index')}}">Страницы Index</a><br><br>
            <form action="{{route('posts.index')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback" style="display: inline-block;">
                        <strong style="color: red;">{{ $message }}</strong>
                    </div>
                @enderror
                <br>
                <label for="content">Content:</label><br>
                <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror"></textarea>
                @error('content')
                    <div class="invalid-feedback" style="display: inline-block;">
                        <strong style="color: red;">{{ $message }}</strong>
                    </div>
                @enderror
                <br>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control-file form-control">
                @error('image')
                    <div class="mt-4 invalid-feedback" style="display: inline-block">
                        <strong style="color: red;">{{ $message }}</strong>
                    </div>
                @enderror
                <br>

                <label for="category_id">Категория:</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <br>
                <button class="btn btn-success form-control" type="submit">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
