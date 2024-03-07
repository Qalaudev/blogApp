@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-6">
            <div class="row">
                <form action="{{route('update.comment',$comment->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="" style="text-align: center">Comment</label>
                    <input class="form-control" type="text" id="content" name="content" value="{{$comment->content}}"><br>
                    <br>
                    <button class="btn btn-success form-control" type="submit">Update Comment</button>
                </form>
            </div>
        </div>
    </div>


@endsection
