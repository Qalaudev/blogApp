@extends('layouts.adm')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Code</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->code}}</td>
                <td><a class="btn btn-primary" href="{{ route('adm.category.edit',[$category->id])}}">Edit</a></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
