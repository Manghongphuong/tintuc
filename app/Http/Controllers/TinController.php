<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinController extends Controller
{
    public function index()
    {
        //tin mới
        $query = DB::table('tin')
        ->select('id','tieuDe','ngayDang', 'xem', 'img');
        $data = $query->get();

        //video
        $video = DB::table('video')
        ->select('id','ten','ngaydang', 'xem', 'videos');
        $dataV = $video->get();

        //nổi bật
        $nb = DB::table('tin')
        ->select('id','tieuDe','ngayDang', 'active', 'img')
        ->where('active', 1);
        $dataB = $nb->get();

        //phổ biến
        $pb = DB::table('tin')
        ->select('id','tieuDe','ngayDang', 'img', 'active')
        ->where('active', 2);
        $dataP = $pb->get();


        $dsdata = [
            'data' => $data,
            'dataV' => $dataV,
            'dataB' => $dataB,
            'dataP' => $dataP
        ];
        return view('layouts.home', $dsdata);
    }

    public function tincd($id = 0)
    {
        $cd = DB::table('tin')
        ->where('idLT', $id);
        $tl = DB::table('loaitin')->where('id', '=', $id)->value('tenmuc');
        $datacd = $cd->get();
        $datacd = ['datacd' => $datacd, 'tl' => $tl];
        return view('pages.blog', $datacd);
    }

    public function detail($id = 0)
    {
        $tin = DB::table('tin')->where('id', $id)->first();
        $data = ['id' => $id, 'tin' => $tin];
        return view('pages.detail', $data);
    }
}
