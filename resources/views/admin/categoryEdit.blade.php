@extends('layouts.adm')
@extends('css')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-6">
            <div class="row">
                <form action="{{ route('adm.category.update',[$category->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="category">Name Category:</label><br>
                    <input class="form-control" type="text" id="category" name="name" required value="{{$category->name}}"><br>
                    <label for="content">Code Category:</label><br>
                    <input type="text" class="form-control" name="code" value="{{$category->code}}"><br>
                    <button class="btn btn-success form-control" type="submit">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
