@extends('layouts.layout')
@section('title')
    Trang Chủ
@endsection

@section('content')

<div class="container-fluid paddding mb-5">
    
    <div class="row mx-0">
    
            <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height"><img src="../uploads/{{$data[0]->img}}" alt="img"/>
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{date('d-m-Y',strtoTime($data[0]->ngayDang))}}</a></div>
                        <div class=""><a href="/detail/{{$data[0]->id}}" class="fh5co_good_font">{{$data[0]->tieuDe}}</a></div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="row">
                @php
                    $data = collect($data)->slice(1,4)
                @endphp
                    @foreach ($data as $tin)
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="../uploads/{{$tin->img}}" alt="img"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{date('d-m-Y',strtoTime($tin->ngayDang))}}</a></div>
                                <div class=""><a href="/detail/{{$tin->id}}" class="fh5co_good_font_2">{{$tin->tieuDe}}</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
           
    </div>
   
</div>
{{-- Nổi Bật --}}
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Nổi Bật</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            @foreach ($dataB as $hot)
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="../uploads/{{$hot->img}}" alt=""class="fh5co_img_special_relative"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="/detail/{{$hot->id}}" class="text-white">{{$hot->tieuDe}}</a>
                        {{-- <div class="fh5co_latest_trading_date_and_name_color"> Walter Johson - March 7,2017</div> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Tin mới --}}
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tin Mới</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            @foreach($data as $tin)
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="../uploads/{{$tin->img}}" alt=""/></div>
                    <div>
                        <a href="/detail/{{$tin->id}}" class="d-block fh5co_small_post_heading"><span class="">{{$tin->tieuDe}}</span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> {{date('d-m-Y',strtoTime($tin->ngayDang))}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Videos --}}
<div class="container-fluid fh5co_video_news_bg pb-4">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Video ẩm thực</div>
        </div>
        <div>
            <div class="owl-carousel owl-theme" id="slider3">
                @foreach($dataV as $v)
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe width="100%" height="200" src="{{$v->videos}}" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
        
                            </div>
                        </div>
                        <div>
                            <a href="#" class="d-block fh5co_small_post_heading"><span class="">{{$v->ten}}</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i>{{date('d-m-Y',strtoTime($v->ngaydang))}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Tin tức --}}
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tin Xem Nhiều</div>
                </div>
                @php
                    $xn = DB::table('tin')->select('id','xem','tieuDe','tomTat','img','ngayDang','noiDung')
                    ->where('xem','>',0)
                    ->orderBy('xem','desc')->get();
                    
                @endphp
                @foreach($xn as $tt)
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="../uploads/{{$tt->img}}" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="/detail/{{$tt->id}}" class="fh5co_magna py-2">{{$tt->tieuDe}}</a> 
                        {{-- <a href="single.html" class="fh5co_mini_time py-3"> Thomson Smith -April 18,2016 </a> --}}
                        <div class="fh5co_consectetur">{{$tt->tomTat}}</div>
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
                @foreach($dataP as $pp)
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
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
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

@endsection