<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_categories = \App\Categories::where('nama_categories','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_categories = \App\Categories::all();
        }
        return view('categories.index',['data_categories' => $data_categories]);
    }
    public function create(Request $request)
    {
        \App\Categories::create($request->all());
        return redirect('/categories')->with('sukses','Data Berhasil Di Input');
    }
    public function edit($id)
    {
        $categories = \App\Categories::find($id);
        return view('categories/edit',['categories' => $categories]);
    }
    public function update(Request $request,$id)
    {
        $categories = \App\Categories::find($id);
        $categories->update($request->all());
        return redirect('/categories')->with('sukses','Data Berhasil Di Update');
    }
    public function delete($id)
    {
        $categories =\App\Categories::find($id);
        $categories->delete($categories);
        return redirect('/categories')->with('sukses','Data Berhasil Di Hapus');
    }
}
