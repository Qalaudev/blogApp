@extends('layouts.adm')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Post ID</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Category</th>
            <th scope="col">Author</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach($post as $onePost)
                <tr>
                    <th scope="row">{{$onePost->id}}</th>
                    <td>{{$onePost->title}}</td>
                    <td>{{$onePost->content}}</td>
                    <td>{{$onePost->category_id}}</td>
                    <td>{{$onePost->user->name}}({{$onePost->user->role->name}})</td>
                    <td><a class="btn btn-primary" href="{{ route('adm.management.editPost',[$onePost->id])}}">Edit </a></td>
                    <td>
                        <form action="{{ route('adm.management.postDelete', [$onePost->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger form-control" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
