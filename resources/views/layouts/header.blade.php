<div class="container-fluid fh5co_header_bg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 fh5co_mediya_center">
                <div class="d-inline-block fh5co_trading_posotion_relative"><a href="#" class="treding_btn">Xu hướng</a>
                    <div class="fh5co_treding_position_absolute"></div>
                </div>
            </div>
            <div class="col-12 col-md-3 fh5co_mediya_right">
                @if(Auth::check())
                        <div class="d-inline-block fh5co_trading_posotion_relative">
                            <a class=" treding_btn nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
                            </div>
                        </div>
                @else
                    <div class="d-inline-block fh5co_trading_posotion_relative">
                        <a href="{{route('login')}}" class="treding_btn">Đăng nhập</a>
                    </div>
                @endif
            </div> 
            <div class="col-12 col-md-3 fh5co_mediya_left">
                <div class="d-inline-block fh5co_trading_posotion_relative"><a href="{{route('register')}}" class="treding_btn">Đăng ký</a></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="{{ asset('img/logo.png')}}" alt="img" class="fh5co_logo_width"/>
            </div>
            <div class="col-12 col-md-6 align-self-center fh5co_mediya_center">
                <nav class="navbar">
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
                </nav>
            </div>
            <div class="col-12 col-md-3 align-self-center fh5co_mediya_left">
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Blog <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Duy nhất <span class="sr-only">(current)</span></a>
                    </li>
                    @php    
                        $lts = DB::table('loaitin')->get();
                    @endphp
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Ẩm thực <span class="sr-only">(current)</span></a>
                        @foreach ($lts as $cd)
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="/tincd/{{$cd->id}}">{{$cd->tenmuc}}</a>
                        </div>
                        @endforeach
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Chúng tôi <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>