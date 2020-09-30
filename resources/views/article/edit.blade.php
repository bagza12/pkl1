@extends('layouts.master')

@section('content')
    <h1>Edit Data Article</h1>
    @if(session('sukses'))
    <div class="alert alert-primary" role="alert">
        {{session('sukses')}}
    </div>  
    @endif
    <div class="row">
    <div class="col-lg-12 mt-2">
    <form action="/article/{{$article->id}}/update" method="POST"  enctype="multipart/form-data" >
      {{(csrf_field())}}
      <div class="form-group">
      <label for="exampleInpuname">Image</label>
            <input type="file" name="avatar" class="form-control">
            <label for="exampleInpuname">Title</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Title" name="title" value="{{$article->title}}">
            <label for="exampleInpuname">Description</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Description" name="description" value="{{$article->description}}">
            <label for="exampleInpuname">Release Date</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Release Date" name="date" value="{{$article->release_date}}">
        </div>
        <div class="form-group">
              <label>Tags</label>
              <select class="form-control" name="categories[]">
              @foreach($data_categories as $categories)
              <option value="{{$data_categories->id}}">{{$data_categories->name_categories}}</option>
              @endforeach
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