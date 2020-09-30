    @extends('layouts.master')

@section('content')
    <h1>Edit Data Categories</h1>
    @if(session('sukses'))
    <div class="alert alert-primary" role="alert">
        {{session('sukses')}}
    </div>  
    @endif
    <div class="row">
    <div class="col-lg-12 mt-2">
    <form action="/user/{{$management->id}}/update" method="POST" enctype="multipart/form-data">
      {{(csrf_field())}}
      <div class="form-group">
      <label for="exampleInpuname">Image</label>
            <input type="file" name="avatar" class="form-control"  value="{{$management->avatar}}">
            <label for="exampleInpuname">Username</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Username" name="username" value="{{$management->username}}">
            <label for="exampleInpuname">Email</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Email" name="email" value="{{$management->email}}">
            <label for="exampleInpuname">Level</label>
            <select name="level" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
            </select>
        </div>
            </div>
            <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    </div>
    </div>
    </div>
    @endsection