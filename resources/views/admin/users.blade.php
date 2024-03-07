@extends('layouts.adm')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role </th>
            <th scope="col">Edit Role</th>
            <th scope="col">Bun</th>
        </tr>
        </thead>
        <tbody>
            @for($i=0; $i<count($users); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$users[$i]->name}} </td>
                    <td>{{$users[$i]->email}}</td>
                    <td>{{$users[$i]->role->name}}</td>
                    <td @if(\Illuminate\Support\Facades\Auth::user()->role->name == 'admin')>
                        <a class="btn btn-primary" href="{{ route('adm.management.edit',[$users[$i]->id])}}">Edit Role</a>
                    </td @endif>
                    <td>
                        <form action="@if($users[$i]->is_active) {{route('adm.management.bun',$users[$i]->id)}} @else {{ route('adm.management.unbun',$users[$i]->id) }} @endif" method="post">
                            @csrf
                            @method('PUT')
                                @if($users[$i]->is_active)
                                    <button class="btn btn-danger">Bun</button>
                                @else
                                    <button class="btn btn-primary">Unbun</button>
                                @endif
                            </button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
@endsection

