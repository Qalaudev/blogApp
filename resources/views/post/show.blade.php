@extends('layouts.app')
@section('content')
<style>
    a {
        text-decoration: none;
        color: inherit;
    }
    .button-container {
        display: flex;
        justify-content: space-between; /* или другие значения в зависимости от вашего дизайна */
    }

</style>
<div class="container d-flex justify-content-center align-items-center">
    <div class="col-6">
        <div class="row">
            <a class="btn btn-info" href="{{route('posts.index')}}">Страницы Index</a>
            <h4></h4>
            <h4 class="form-control">{{ $post->title }}</h4>
            <h4 class="form-control"> {{ $post->content}} </h4>

            <div class="button-container">
                @can('update', $post)
                    <a class="form-control" style="text-align: center; flex: 1;" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                @endcan
                @can('delete',$post)
                    <form action="{{route('posts.destroy',$post->id)}}" method="POST" style="flex: 1;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger form-control" onclick="return confirm('Вы хотите удалить?')">Delete</button>
                    </form>
                @endcan
            </div>



            {{--delete post--}}
            <h4></h4>

            {{--comment form--}}
            <form action="{{route('store.comment', $post->id)}}" method="post">
                @csrf
                @method('POST')
                <h4 style="text-align: center">Comment</h4>
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <textarea name="content" class="form-control"></textarea><br>
                <button class="form-control btn btn-info">Send Comment</button>
            </form>


            <div></div>

            @foreach( $post->comments as $comment )
                <p>{{ $comment->content }}</p>
                <small>{{ $comment->user->name }}</small>

                <div><br></div>

                <div class="button-container">
                    @can('delete',$comment)
                        <a class="form-control" style="text-align: center; flex: 1;" href="{{ route('edit.comment',$comment->id) }}">Edit</a>
                        <form action="{{ route('destroy.comment',$comment->id) }}" method="post" style="flex: 1;">
                            <input type="hidden" name="commentId" value="{{$comment->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger form-control" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    @endcan
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
