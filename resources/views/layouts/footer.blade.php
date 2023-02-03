<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="{{ asset('img/white_logo.png')}}" alt="img" class="footer_logo"/></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> <Canvas>Chúng tôi</Canvas></div>
                {{-- <div class="footer_sub_about pb-3"> Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div> --}}
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3">Ẩm thực</div>
                @php
                        $lt = DB::table('loaitin')->get();
                @endphp
                @foreach($lt as $cd)
                <ul class="footer_menu">
                    <li><a href="/tincd/{{$cd->id}}" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; {{$cd->tenmuc}}</a></li>
                </ul>
                @endforeach
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <div class="footer_main_title py-3"> Bài đăng được xem nhiều nhất</div>
                @php
                        $txn = DB::table('tin')->limit(3);
                        $dataX = $txn->get();
                @endphp
                @foreach ($dataX as $nn)
                <div class="footer_makes_sub_font">{{$nn->ngayDang}}</div>
                <a href="/detail/{{$nn->id}}" class="footer_post pb-4">{{$nn->tieuDe}}</a>
                @endforeach
                <div class="footer_position_absolute"><img src="{{ asset('images/footer_sub_tipik.png') }}" alt="img" class="width_footer_sub_img"/></div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3">Hình ảnh</div>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a1.jpg') }}" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a2.jpg') }}" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a3.png') }}" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a4.png') }}" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a5.jpg') }}" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a6.jpg') }}" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a7.jpg') }}" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a8.jpg') }}" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="{{ asset('img/a9.jpg') }}" alt="img"/></a>
            </div>
        </div>
        <div class="row justify-content-center pt-2 pb-4">
            <div class="col-12 col-md-8 col-lg-7 ">
                <div class="input-group">
                    <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control fh5co_footer_text_box" placeholder="Email của bạn..." aria-describedby="basic-addon1">
                    <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Gửi</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>
