
@extends('layouts.layout')

@section('title')
    {{$tin->tieuDe}}
@endsection
@section('content')
<div class="single">
    <div id="fh5co-title-box" style="background-image: url(../uploads/{{$tin->img}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="page-title">
            <span>{{$tin->ngayDang}}</span>
            <h2>{{$tin->tieuDe}}</h2>
        </div>
    </div>
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    {{-- <h2>{{$tin->tieuDe}}</h2> --}}
                    <p style="text-align:justify">
                        <strong><em>{{$tin->tomTat}}</em></strong>
                    </p>
                    <p>
                        {{$tin->noiDung}}
                    </p>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Chủ đề</div>
                    </div>
                    <div class="clearfix"></div>
                    @php
                        $lt = DB::table('loaitin')->get();
                    @endphp
                    @foreach($lt as $cd)
                        <div class="fh5co_tags_all">
                            <a href="/tincd/{{$cd->id}}" class="fh5co_tagg">{{$cd->tenmuc}}</a>
                        </div>
                    @endforeach
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Phổ Biến Nhất</div>
                    </div>
                    @php
                    $pb = DB::table('tin')
                    ->select('id','tieuDe','ngayDang', 'img', 'active')
                    ->where('active', 2);
                    $dataP = $pb->get();
                    @endphp
                    @foreach ($dataP as $pp)
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="../uploads/{{$pp->img}}" alt="img" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font">
                                <a href="/detail/{{$pp->id}}" class="fh5co_consectetur">{{$pp->tieuDe}}</a>
                            </div>
                            {{-- <div class="most_fh5co_treding_font_123"> April 18, 2016</div> --}}
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Nổi Bật</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @php
                    $dataB = DB::table('tin')->where('active',1)->get();
                @endphp
                @foreach ($dataB as $hot)
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="../uploads/{{$hot->img}}" alt=""/></div>
                        <div>
                            <a href="/detail/{{$hot->id}}" class="d-block fh5co_small_post_heading"><span class="">{{$hot->tieuDe}}</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i>{{$hot->ngayDang}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
