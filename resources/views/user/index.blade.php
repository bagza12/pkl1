@extends('layouts.master')

@section('content')

    @if(session('sukses'))
    <div class="alert alert-primary" role="alert">
        {{session('sukses')}}
    </div>  
    @endif
    <div class="row">
    <div class="col-6">
    <h1>Data Usermanagement</h1>
    </div>
    <div class="col-6">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right btn btn-sm" data-toggle="modal" data-target="#exampleModal">
  Tambah Data Usermanagement
</button>

<!-- Modal -->

    </div>
    <div class="container mt-4">
<table class="table table-hover">
    <tr>
    <th>Id</th>
    <th>Image</th>
    <th>Username</th>
    <th>Email</th>
    <th>Level</th>
    <th>Action</th>
    </tr>
    @foreach($data_management as $management)
    <tr>
        <td>{{$management->id}}</td>
        <td><img src="{{url('images/'.$management->image)}}" width="100"></td>
        <td>{{$management->username}}</td>
        <td>{{$management->email}}</td>
        <td>{{$management->level}}</td>
        <td><a href="user/{{$management->id}}/edit" class="btn btn-danger">Edit</a></td>
        <td><a href="user/{{$management->id}}/delete" class="btn btn-secondary" onclick="returm confirm('Yakin Mau Di Hapus ?')">Delete</a></td>
    </tr>
    @endforeach
</table>
    </div>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/user/create" method="POST" enctype="multipart/form-data" >
      {{(csrf_field())}}
      <div class="form-group">
      <label for="exampleInpuname">Image</label>
            <input type="file" name="avatar" class="form-control">
            <label for="exampleInpuname">Username</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Username" name="username">
            <label for="exampleInpuname">Email</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Email" name="email">
         <label for="exampleInpuname">Level</label>
          <select name="level" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection