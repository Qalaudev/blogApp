@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="col-6">
        <div class="row">
            <a class="form-control" style="text-align: center" href="{{route('index.category')}}">Страницы Category</a><br><br>
            <div class="row">
                <form action="{{route('index.category')}}" method="post">
                    @csrf
                    <label for="code">Name:</label><br>
                    <input type="text" id="name" name="name" placeholder="Sport" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback" style="display: inline-block;">
                            <strong style="color: red;">{{ $message }}</strong>
                        </div>
                    @enderror
                    <label for="code">Code:</label><br>
                    <input type="text" id="code" name="code" placeholder="Sport -> SPR" class="form-control @error('code') is-invalid @enderror">
                    @error('code')
                        <div class="invalid-feedback" style="display: inline-block;">
                            <strong style="color: red;">{{ $message }}</strong>
                        </div>
                    @enderror
                    <br><button class="btn btn-success form-control" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
