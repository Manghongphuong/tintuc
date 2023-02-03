
@extends('layouts.layout')

@section('title')
    {{$tl}}
@endsection

@section('content')
    
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">{{$tl}}</div>
                </div>
                
                @foreach($datacd as $tcd)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="../uploads/{{$tcd->img}}" alt=""/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="/detail/{{$tcd->id}}" class="fh5co_magna py-2">{{$tcd->tieuDe}}</a> 
                            {{-- <a href="#" class="fh5co_mini_time py-3"> Thomson Smith -April 18,2016 </a> --}}
                            <div class="fh5co_consectetur">{{$tcd->tomTat}}</div>
                        </div>
                    </div>
                @endforeach
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
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Phổ biến nhất</div>
                </div>
                @php
                    $pb = DB::table('tin')
                    ->select('id','tieuDe','ngayDang', 'img', 'active')
                    ->where('active',2);
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
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
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
@endsection
