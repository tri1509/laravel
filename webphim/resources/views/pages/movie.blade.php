@extends('layout')
@section('content')
<div class="row container" id="wrapper">
  <div class="halim-panel-filter">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-6">
          <div class="yoast_breadcrumb hidden-xs">
            <span><span>
              <a href="{{route('category',$movie -> category -> slug)}}">
                {{ $movie -> category -> title }}
              </a> » 
              <span>
                <a href="{{route('country',$movie -> country -> slug)}}">
                  {{ $movie -> country -> title }}
                </a> » 
                <span class="breadcrumb_last" aria-current="page">
                  {{ $movie -> title }}
                </span>
              </span>
            </span></span>
          </div>
        </div>
      </div>
    </div>
    <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
      <div class="ajax"></div>
    </div>
  </div>
  <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
    <section id="content" class="test">
      <div class="clearfix wrap-content">
        <div class="halim-movie-wrapper">
          <div class="title-block">
            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
              <div class="halim-pulse-ring"></div>
            </div>
            <div class="title-wrapper" style="font-weight: bold;">
              Bookmark
            </div>
          </div>
          <div class="movie_info col-xs-12">
            <div class="movie-poster col-md-3">
              <img class="movie-thumb"
                src="{{ asset('/uploads/movie/'.$movie -> image) }}"
                alt="{{ $movie -> title }}">
              <div class="bwa-content">
                <div class="loader"></div>
                <a href="{{route('watch')}}" class="bwac-btn">
                  <i class="fa fa-play"></i>
                </a>
              </div>
              @if ($movie -> trailer != NULL) 
                <a href="#watch_trailer" class="btn btn-info" style="display:block">Xem trailer</a>
              @endif
            </div>
            <div class="film-poster col-md-9">
              <h1 class="movie-title title-1"
                style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                {{ $movie -> title }}
              </h1>
              <h2 class="movie-title title-2" style="font-size: 12px;">
                {{ $movie -> name_eng }}
              </h2>
              <ul class="list-info-group">
                <li class="list-info-group-item">
                  <span>Trạng Thái</span> : 
                  <span class="quality">
                    @if($movie -> resolution == 0)
                      HD
                    @elseif($movie -> resolution == 1)
                      SD
                    @elseif($movie -> resolution == 2)
                      HDCam
                    @elseif($movie -> resolution == 3)
                      Cam
                    @elseif($movie -> resolution == 4)
                      FullHD
                    @endif
                  </span>
                  <span class="episode">
                    @if($movie -> phude == 0)
                      Phụ đề
                    @else
                      Thuyết minh
                    @endif
                  </span>
                  </li>
                <li class="list-info-group-item">
                  <span>Điểm IMDb</span> : 
                  <span class="imdb">7.2</span>
                </li>
                <li class="list-info-group-item">
                  <span>Thời lượng</span> : {{ $movie -> thoiluong }} Phút
                </li>
                <li class="list-info-group-item">
                  <span>Danh mục</span> : 
                  <a href="{{route('category',$movie -> category -> slug)}}" rel="category tag">
                    {{ $movie -> category -> title }}
                  </a>
                </li>
                <li class="list-info-group-item">
                  <span>Thể loại</span> : 
                  <a href="{{route('genre',$movie -> genre -> slug)}}" rel="category tag">
                    {{ $movie -> genre -> title }}
                  </a>
                </li>
                <li class="list-info-group-item">
                  <span>Quốc gia</span> : 
                  <a href="{{route('country',$movie -> country -> slug)}}" rel="tag">
                    {{ $movie -> country -> title }}
                  </a>
                </li>
                <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director" rel="nofollow"
                    href="https://phimhay.co/dao-dien/cate-shortland" title="Cate Shortland">Cate Shortland</a></li>
                <li class="list-info-group-item last-item"
                  style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;">
                  <span>Diễn viên</span> : <a href="" rel="nofollow" title="C.C. Smiff">C.C. Smiff</a>, <a href=""
                    rel="nofollow" title="David Harbour">David Harbour</a>, <a href="" rel="nofollow"
                    title="Erin Jameson">Erin Jameson</a>, <a href="" rel="nofollow" title="Ever Anderson">Ever
                    Anderson</a>, <a href="" rel="nofollow" title="Florence Pugh">Florence Pugh</a>, <a href=""
                    rel="nofollow" title="Lewis Young">Lewis Young</a>, <a href="" rel="nofollow"
                    title="Liani Samuel">Liani Samuel</a>, <a href="" rel="nofollow" title="Michelle Lee">Michelle
                    Lee</a>, <a href="" rel="nofollow" title="Nanna Blondell">Nanna Blondell</a>, <a href=""
                    rel="nofollow" title="O-T Fagbenle">O-T Fagbenle</a>
                </li>
              </ul>
              <div class="movie-trailer hidden"></div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div id="halim_trailer"></div>
        <div class="clearfix"></div>
        <div class="section-bar clearfix">
          <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
        </div>
        <div class="entry-content htmlwrap clearfix">
          <div class="video-item halim-entry-box">
            <article id="post-38424" class="item-content">
              {{ $movie -> description }}
            </article>
          </div>
        </div>
        {{-- tags phim --}}
        <div class="section-bar clearfix">
          <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
        </div>
        <div class="entry-content htmlwrap clearfix">
          <div class="video-item halim-entry-box">
            <article id="post-38424" class="item-content">
              @if ($movie -> tags != NULL) 
                @php
                  $tags = array();
                  $tags = explode(',',$movie -> tags);
                @endphp
  
                @foreach ($tags as $tag) 
                  <a href="{{ url('tag/'.$tag) }}">{{ $tag }}</a><br>
                @endforeach
              @else
                Chưa có từ khoá !
              @endif
            </article>
          </div>
        </div>
        {{-- Trailer phim --}}
        @if ($movie -> trailer != NULL) 
          <div class="section-bar clearfix" id="watch_trailer">
            <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
          </div>
          <div class="entry-content htmlwrap clearfix">
            <div class="video-item halim-entry-box">
              <article id="post-38424" class="item-content">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $movie -> trailer }}" title="{{ $movie -> title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </article>
            </div>
          </div>
        @endif
      </div>
    </section>
    <section class="related-movies">
      <div id="halim_related_movies-2xx" class="wrap-slider">
        <div class="section-bar clearfix">
          <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
        </div>
        @if (count($related) > 0) 
        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
            @foreach ($related as $key => $mov) 
              <article class="thumb grid-item post-38498">
                <div class="halim-item">
                  <a class="halim-thumb" href="{{ route('movie',$mov -> slug) }}" title="{{ $mov -> title }}">
                    <figure><img class="lazy img-responsive"
                        src="{{ asset('/uploads/movie/'.$mov -> image) }}"
                        alt="{{ $mov -> title }}" title="{{ $mov -> title }}"></figure>
                    <span class="status">
                      @if($mov -> resolution == 0)
                        HD
                      @elseif($mov -> resolution == 1)
                        SD
                      @elseif($mov -> resolution == 2)
                        HDCam
                      @elseif($mov -> resolution == 3)
                        Cam
                      @elseif($mov -> resolution == 4)
                        FullHD
                      @endif
                    </span>
                    <span class="episode">
                      <i class="fa fa-play" aria-hidden="true"></i>
                      @if($mov -> phude == 0)
                        Phụ đề
                      @else
                        Thuyết minh
                      @endif
                    </span>
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                      <div class="halim-post-title ">
                        <p class="entry-title">{{ $mov -> title }}</p>
                        <p class="original_title">{{ $mov -> name_eng }}</p>
                      </div>
                    </div>
                  </a>
                </div>
              </article>
            @endforeach
          </div>
          @endif
        <script>
          $(document).ready(function($) {
            var owl = $('#halim_related_movies-2');
            owl.owlCarousel({
              loop: true,
              margin: 5,
              autoplay: true,
              autoplayTimeout: 4000,
              autoplayHoverPause: true,
              nav: true,
              navText: ['<i class="fa-solid fa-chevron-left"></i>',
                '<i class="fa-solid fa-chevron-right"></i>'
              ],
              responsiveClass: true,
              responsive: {
                0: {
                  items: 2
                },
                480: {
                  items: 2
                },
                600: {
                  items: 4
                },
                1000: {
                  items: 4
                }
              }
            })
          });
        </script>
      </div>
    </section>
  </main>
  
  @include('pages.inc.sidebar')

</div>
@endsection