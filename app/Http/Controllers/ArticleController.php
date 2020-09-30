<?php

namespace App\Http\Controllers;

use \App\Article;
use \App\Categories;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $data_categories = Categories::get();
        $data_article = \App\Article::all();
        return view('article.index',compact('data_article','data_categories'));
    }
    public function create(Request $request)
    {
		if($request->avatar){
            $file = $request->file('avatar');
  
            $filename = time()."_".$file->getClientOriginalName();
  
            $tujuan_upload  = 'images';
            $file->move($tujuan_upload,$filename);
  
            Article::create([
              'image' =>$filename,
              'title' => $request->title,
              'description' => $request->description,
              'release_date' => $request->release_date,
              'tags' => $request->tags,
  
            ]);
        }else{
            Article::create([
              'title' => $request->title,
              'description' => $request->description,
              'release_date' => $request->release_date,
              'tags' => $request->tags,
            ]);
        }
          return redirect('/article');
      }
    public function edit($id)
    { 
        $data_categories = Categories::findOrFail($id);
        $article = \App\Article::findOrFail($id);
        return view('article.edit',compact('data_categories','article'));
    }
    public function update(Request $request,$id)
    {
      $data_categories = Categories::findOrFail($id);
      $data_article = Article::findOrFail($id);
      if($request->avatar){
          $file = $request->file('avatar');

          $filename = time()."_".$file->getClientOriginalName();

          $tujuan_upload  = 'images';
          $file->move($tujuan_upload,$filename);

          $data_article->update([
            'image' =>$filename,
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'tags' => $request->tags,

          ]);
      }else{
          $data_article->update([
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'tags' => $request->tags,
          ]);
      }
        return redirect('/article');
    }
    public function delete($id)
    {
        $article =\App\Article::find($id);
        $article->delete($article);
        return redirect('/article')->with('sukses','Data Berhasil Di Hapus');
    }
}