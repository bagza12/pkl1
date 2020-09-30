@extends('layouts.master')

@section('content')

    @if(session('sukses'))
    <div class="alert alert-primary" role="alert">
        {{session('sukses')}}
    </div>  
    @endif
    <div class="row">
    <div class="col-6">
    <h1>Data Article</h1>
    </div>
    <div class="col-6">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right btn btn-sm" data-toggle="modal" data-target="#exampleModal">
  Tambah Data Article
</button>

<!-- Modal -->

    </div>
    
<table class="table table-hover">
    <tr>
    <th>Id</th>
    <th>Image</th>
    <th>Title</th>
    <th>Description</th>
    <th>Release Date</th>
    <th>Tags</th>
    <th>Action</th>
    </tr>
    @foreach($data_article as $article)
    <tr>
        <td>{{$article->id}}</td>
        <td><img src="{{url('images/'.$article->image)}}" width="100">  </td>
        <td>{{$article->title}}</td>
        <td>{{$article->description}}</td>
        <td>{{$article->release_date}}</td>
        <td>
        <td><a href="article/{{$article->id}}/edit" class="btn btn-danger">Edit</a></td>
        <td><a href="article/{{$article->id}}/delete" class="btn btn-secondary" onclick="returm confirm('Yakin Mau Di Hapus ?')">Delete</a></td>
    </tr>
    <tr>
      <td></td>
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
      <form action="/article/create" method="POST" enctype="multipart/form-data">
      {{(csrf_field())}}
      <div class="form-group">
            <label for="exampleInpuname">Image</label>
            <input type="file" name="avatar" class="form-control">
            <label for="exampleInpuname">Title</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Title" name="title">
            <label for="exampleInpuname">Description</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Description" name="description">
            <label for="exampleInpuname">Release Date</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Release Date" name="date">
            </div>
            
            <div class="form-group">
              <label>Tags</label>
              <select class="form-control" name="categories[]">
              @foreach($data_categories as $categories)
              <option value="{{$categories->id}}">{{$categories->name_categories}}</option>
              @endforeach
              </select>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection