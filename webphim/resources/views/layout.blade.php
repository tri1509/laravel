<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta name="theme-color" content="#234556">
  <meta http-equiv="Content-Language" content="vi" />
  <meta content="VN" name="geo.region" />
  <meta name="DC.language" scheme="utf-8" content="vi" />
  <meta name="language" content="Việt Nam">
  <link rel="shortcut icon"
    href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png"
    type="image/x-icon" />
  <meta name="revisit-after" content="1 days" />
  <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
  <title>Phim hay 2023 - Xem phim hay nhất</title>
  <meta name="description"
    content="Phim hay 2023 - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
  <link rel="canonical" href="">
  <link rel="next" href="" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:title" content="Phim hay 2023 - Xem phim hay nhất" />
  <meta property="og:description"
    content="Phim hay 2023 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
  <meta property="og:url" content="" />
  <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất" />
  <meta property="og:image" content="" />
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="55" />
  <link rel='dns-prefetch' href='//s.w.org' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel='stylesheet' id='bootstrap-css' href="{{ asset('css/bootstrap.min.css') }}" media='all' />
  <link rel='stylesheet' id='style-css' href="{{ asset('css/style.css') }}" media='all' />
  <link rel='stylesheet' id='wp-block-library-css' href="{{ asset('css/style.min.css') }}" media='all' />
  <script type='text/javascript' src="{{ asset('js/jquery.min.js') }}" id='halim-jquery-js'></script>
  <style type="text/css" id="wp-custom-css">
  .textwidget p a img {
    width: 100%;
  }
  </style>
</head>

<body class="home blog halimthemes halimmovies" data-masonry="">
  <header id="header">
    <div class="container">
      <div class="row" id="headwrap">
        <div class="col-md-3 col-sm-6 slogan">
          <p class="site-title"><a class="logo" href="" title="phim hay ">Phim Hay</a></p>
        </div>
        <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
          <div class="header-nav">
            <div class="col-xs-12">
              <div class="form-group">
                <div class="input-group col-xs-12 position-relative">
                  <form id="search-form-pc" name="halimForm" role="search" action="{{ route('tim-kiem') }}" method="GET">
                    <input id="timkiem" type="text" name="s" class="form-control timkiem" placeholder="Tìm kiếm..."
                      autocomplete="off" required>
                    <button class="btn btn-input-group">
                      <i class="fa-solid fa-magnifying-glass icon-input-group"></i>
                    </button>
                  </form>
                </div>
              </div>
              <ul class="list-group" id="result"></ul>
              <ul class="ui-autocomplete ajax-results hidden"></ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 hidden-xs">
          <div id="get-bookmark" class="box-shadow"><i class="fa-solid fa-bookmark"></i><span> Bookmarks</span><span
              class="count">0</span></div>
          <div id="bookmark-list" class="hidden bookmark-list-on-pc">
            <ul style="margin: 0;"></ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="navbar-container">
    <div class="container">
      <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim"
            aria-expanded="false">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse"
            data-target="#search-form" aria-expanded="false">
            <span class="hl-search" aria-hidden="true"></span>
          </button>
          <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
            Bookmarks<i class="hl-bookmark" aria-hidden="true"></i>
            <span class="count">0</span>
          </button>
          <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
            <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="halim">
          <div class="menu-menu_1-container">
            <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
              <li class="current-menu-item active"><a title="Trang Chủ" href="{{route('homepage')}}">Trang Chủ</a></li>

              @foreach($category as $key => $cate)
              <li class="mega">
                <a title="{{$cate -> title}}" href="{{route('category',$cate -> slug)}}">
                  {{$cate -> title}}
                </a>
              </li>
              @endforeach

              <li class="mega dropdown">
                <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle"
                  aria-haspopup="true">
                  Thể Loại <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">

                  @foreach($genre as $key => $genre)
                  <li>
                    <a title="{{$genre -> title}}" href="{{route('genre',$genre -> slug)}}">
                      {{$genre -> title}}
                    </a>
                  </li>
                  @endforeach

                </ul>
              </li>
              <li class="mega dropdown">
                <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle"
                  aria-haspopup="true">Quốc Gia<span class="caret"></span></a>
                <ul role="menu" class=" dropdown-menu">

                  @foreach($country as $key => $country)
                  <li>
                    <a title="{{$country -> title}}" href="{{route('country',$country -> slug)}}">
                      {{$country -> title}}
                    </a>
                  </li>
                  @endforeach
                  
                </ul>
              </li>
              <li class="mega dropdown">
                <a title="Năm" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm <span
                    class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                  @for ($year = 1995; $year <= 2020; $year ++) 
                    <li>
                      <a title="Năm {{ $year }}" href="{{ url('nam-'.$year) }}">
                        {{ $year }}
                      </a>
                    </li> 
                  @endfor
                </ul>
              </li>
            </ul>
          </div>
          <ul class="nav navbar-nav navbar-left" style="background:#000;">
            <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
          </ul>
        </div>
      </nav>
      <div class="collapse navbar-collapse" id="search-form">
        <div id="mobile-search-form" class="halim-search-form"></div>
      </div>
      <div class="collapse navbar-collapse" id="user-info">
        <div id="mobile-user-login"></div>
      </div>
    </div>
  </div>
  </div>

  <div class="container">
    <div class="row fullwith-slider"></div>
  </div>
  <div class="container">
    @yield('content')
  </div>
  <div class="clearfix"></div>
  <footer id="footer" class="clearfix">
    <div class="container footer-columns">
      <div class="row container">
        <div class="widget about col-xs-12 col-sm-4 col-md-4">
          <div class="footer-logo">
            <img class="img-responsive"
              src="https://img.favpng.com/9/23/19/movie-logo-png-favpng-nRr1DmYq3SNYSLN8571CHQTEG.jpg"
              alt="Phim hay 2021- Xem phim hay nhất" />
          </div>
          Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
            data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[email&#160;protected]</a>
        </div>
      </div>
    </div>
  </footer>
  <div id='easy-top'></div>
  <script type='text/javascript' src="{{asset ('js/bootstrap.min.js') }}" id='bootstrap-js'></script>
  <script type='text/javascript' src="{{asset ('js/owl.carousel.min.js') }}" id='carousel-js'></script>
  <script type='text/javascript' src="{{asset ('js/halimtheme-core.min.js') }}" id='halim-init-js'></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script> --}}
  <script type='text/javascript' src="{{asset ('js/app.js') }}"></script>
</body>

</html>