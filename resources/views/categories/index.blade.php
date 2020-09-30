@extends('layouts.master')

@section('content')

    @if(session('sukses'))
    <div class="alert alert-primary" role="alert">
        {{session('sukses')}}
    </div>  
    @endif
    <div class="row">
    <div class="col-6">
    <h1>Data Categories</h1>
    </div>
    <div class="col-6">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right btn btn-sm" data-toggle="modal" data-target="#exampleModal">
  Tambah Data Categories
</button>

<!-- Modal -->

    </div>
    
<table class="table table-hover">
    <tr>
    <th>ID</th>
    <th>NAME CATEGORIES</th>
    <th>ACTION</th>
    </tr>
    @foreach($data_categories as $categories)
    <tr>
        <td>{{$categories->id}}</td>
        <td>{{$categories->name_categories}}</td>
        <td><a href="categories/{{$categories->id}}/edit" class="btn btn-danger bnt-sm">Edit</a></td>
        <td><a href="categories/{{$categories->id}}/delete" class="btn btn-secondary btn-sm" onclick="returm confirm('Yakin Mau Di Hapus ?')">Delete</a></td>
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
      <form action="/categories/create" method="POST">
      {{(csrf_field())}}
      <div class="form-group">
            <label for="exampleInpuname">NAME CATEGORIES</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Name Categories" name="name_categories">
        </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</a></button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection