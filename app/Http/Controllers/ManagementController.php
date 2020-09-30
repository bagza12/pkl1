<?php

namespace App\Http\Controllers;

use \App\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index(Request $request)
    {
        $data_management = \App\Management::all();
        return view('user.index',compact('data_management'));
    }
    public function create(Request $request)
    {
            if($request->avatar){
                $file = $request->file('avatar');
      
                $filename = time()."_".$file->getClientOriginalName();
      
                $tujuan_upload  = 'images';
                $file->move($tujuan_upload,$filename);
      
                $data_management->update([
                  'image' =>$filename,
                  'username' => $request->username,
                  'email' => $request->email,
                  'level' => $request->level,      
                ]);
            }else{
                $data_management->update([
                  'username' => $request->username,
                  'email' => $request->email,
                  'level' => $request->level,
                ]);
            }
              return redirect('/user');
          }
    public function edit($id)
    {
        $management = \App\Management::find($id);
        return view('user.edit',['management' => $management]);
    }
    public function update(Request $request,$id)
    {
        $data_management = Management::findOrFail($id);
        if($request->avatar){
            $file = $request->file('avatar');
  
            $filename = time()."_".$file->getClientOriginalName();

  
            $tujuan_upload  = 'images';
            $file->move($tujuan_upload,$filename);
  
            $data_management->update([
              'image' =>$filename,
              'username' => $request->username,
              'email' => $request->email,
              'level' => $request->level,  
            ]);
        }else{
            $data_management->update([
              'username' => $request->username,
              'email' => $request->email,
              'level' => $request->level,
            ]);
        }
          return redirect('/user');
    }
    public function delete($id)
    {
        $management =\App\Management::find($id);
        $management->delete($management);
        return redirect('/user')->with('sukses','Data Berhasil Di Hapus');
    }
}