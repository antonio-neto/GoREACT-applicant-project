@extends('templates.template')

@section('content')
  <h1 class="text-center">File Manager</h1>
  <hr />

  <div class="text-center mt-3 mb-4">
        <a href="">
            <button class="btn btn-success">Add</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Saved file</th>
                <th scope="col">User</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($file as $files)
                @php
                    $user=$files->find($files->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$files->id}}</th>
                    <td>{{$files->file_name}}</td>
                    <td>{{$user->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection