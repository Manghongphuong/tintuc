<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaitin;
use App\Models\tin;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeAdminController extends Controller
{
    public function qtv()
    {
        return view('admin.home');
    }
    public function dsdm(){
        $list = \App\Models\loaitin::all();
        return view('admin/Category/list', ['list' => $list]);

    }
    //category
    public function themdm()
    {
        return view('admin/Category/add');
    }
    public function themdm_(){
        $t = new loaitin;
        $t->tenmuc = $_POST['tenmuc'];
        $t->save();
        return redirect('/dm/ds');
    }
    public function xoadm($id){
        $t = loaitin::find($id);
        $t->delete();
        return redirect('/dm/ds');
    }
    public function suadm($id){
        $t = loaitin::find($id);
        if ($t == null) return redirect('/thông báo');
        return view('admin/Category/edit', ['t' => $t]);
    }
    public function suadm_($id){
        $t = loaitin::find($id);
        if ($t == null) return redirect('/thông báo');
        $t->tenmuc = $_POST['tenmuc'];
        $t->save();
        return redirect('/dm/ds');
    }
    //post
    public function dspost(){
        $post = DB::table('tin')
        ->Join ('loaitin', 'tin.idLT', '=', 'loaitin.id')
        ->select('tin.*', 'loaitin.tenmuc');
        $post = $post->get();
        return view('admin/Post/list', ['post' => $post]);
    }
    public function thempost()
    {
        $lt = \App\Models\loaitin::all();
        return view('admin/Post/add', ['lt' => $lt]);
    }
    public function thempost_(Request $request){
        
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $request->merge(['img' => $file_name]);
        // dd($request->all());

        $t = new tin;
        $t->tieuDe = $_POST['tieuDe'];
        $t->tomTat = $_POST['tomTat'];
        $t->noiDung = $_POST['noiDung'];
        $t->ngayDang = $_POST['ngayDang'];
        $t->xem = $_POST['xem'];
        $t->img = $file_name;
        $t->idLT = $_POST['idLT'];
        $t->active = $_POST['active'];
        $t->save();
        return redirect('/post/ds');
    }
    public function xoapost($id){
        $t = tin::find($id);
        $t->delete();
        return redirect('/post/ds');
    }
    public function suapost($id){
        $t = tin::find($id);
        if ($t == null) return redirect('/thông báo');
        $lt = \App\Models\loaitin::all();
        return view('admin/Post/edit', ['t' => $t, 'lt' => $lt]);
    }
    public function suapost_($id, Request $request){
        if($request->has('file_upload')){
            $file = $request->file('file_upload');
            $ext =  $file ->extension();
            $file_name = time().'-'.'news'. '.' .$ext;
            $file->move(public_path('uploads'), $file_name);
            $request->merge(['img' => $file_name]);
        };
        $t = tin::find($id);
        if ($t == null) return redirect('/thông báo');
        $t->tieuDe = $_POST['tieuDe'];
        $t->tomTat = $_POST['tomTat'];
        $t->noiDung = $_POST['noiDung'];
        $t->ngayDang = $_POST['ngayDang'];
        $t->xem = $_POST['xem'];
        $t->img = $file_name;
        $t->idLT = $_POST['idLT'];
        $t->active = $_POST['active'];
        $t->save();
        return redirect('/post/ds');
    }

    
    //user
    public function dsuser(){
        $user = \App\Models\User::all();
        return view('admin/user/list', ['user' => $user]);
    }
    public function xoauser($id){
        $t = \App\Models\User::find($id);
        $t->delete();
        return redirect('/user/ds');
    }
    public function suauser($id){
        $t = \App\Models\User::find($id);
        if ($t == null) return redirect('/thông báo');
        return view('admin/user/update', ['t' => $t]);
    }
    public function suauser_($id){
        $t = \App\Models\User::find($id);
        if ($t == null) return redirect('/thông báo');
        $t->name = $_POST['name'];
        $t->userType = $_POST['userType'];
        $t->save();
        return redirect('/user/ds');
    }
}
