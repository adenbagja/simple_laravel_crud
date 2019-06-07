@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>List Biodata Siswa</h1>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-sm btn-success" href="{{route('biodata.create')}}">Create Now!!!</a>
        </div>
    </div>


@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif

<table class="table table-hover table-sm">
    <tr>
        <th width = "50px"><b>No.</b></th>
        <th width = "300px">Nama Siswa</th>
        <th>Alamat Siswa</th>
        <th width = "180px">Action</th>
    </tr>

    @foreach ($biodatas as $biodata)
        <tr>
        <td><b>{{++$i}}.</b></td>
        <td>{{$biodata->namaSiswa}}</td>
        <td>{{$biodata->alamatSiswa}}</td>
        <td>
            <form action="{{route('biodata.destroy', $biodata->id)}}" method="post">
            <a class="btn btn-sm btn-success" href="{{route('biodata.show', $biodata->id)}}">show</a>
            <a class="btn btn-sm btn-warning" href="{{route('biodata.edit', $biodata->id)}}">edit</a>
            @csrf 
            @method("DELETE")
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
        </tr>
        @endforeach
</table>

{!! $biodatas->links() !!}
</div>


@endsection