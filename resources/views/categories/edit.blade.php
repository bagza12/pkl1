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
    <form action="/categories/{{$categories->id}}/update" method="POST">
      {{(csrf_field())}}
      <div class="form-group">
            <label for="exampleInpuname">NAME CATEGORIES</label>
            <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Name Categories" name="name_categories" value="{{$categories->name_categories}}">
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