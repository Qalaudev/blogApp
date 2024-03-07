@extends('layouts.adm')
@extends('css')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-6">
            <div class="row">
                <form action="{{ route('adm.management.update',['user'=>$user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="title">Name:</label><br>
                    <input class="form-control" type="text" id="name" name="name" readonly value="{{ $user->name }}"><br>
                    <br>
                    <label for="content">Email:</label><br>
                    <textarea class="form-control" id="email" name="email" readonly>{{ $user->email }}</textarea><br>
                    <br>
                    <label for="role">Role</label>
                    <select class="form-control" name="role_id">
                        @foreach($role as $rname)
                            <option @if($rname->id == $user->role_id) selected @endif value="{{$rname->id}}">{{$rname->name}}</option>
                        @endforeach
                    </select><br>
                    <button class="btn btn-success form-control" type="submit">Update User</button>
                </form>

            </div>
        </div>
    </div>
@endsection

