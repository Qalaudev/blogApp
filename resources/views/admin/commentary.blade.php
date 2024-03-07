@extends('layouts.adm')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Comment ID</th>
            <th scope="col">Commentary</th>
            <th scope="col">User Name</th>
            <th scope="col">Post ID</th>
            <th scope="col">Role</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comment as $commentary)
            <tr>
                <th scope="row">{{$commentary->id}}</th>
                <td>{{$commentary->content}}</td>
                <td>{{$commentary->user->name}}</td>
                <td>{{$commentary->post->id}}</td>
                <td>{{$commentary->user->role->name}}</td>
                <td>
                    <form action="{{ route('adm.management.deleteComment', [$commentary->id])}}" method="post">
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
