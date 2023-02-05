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
          <div class="movie_info col-xs-12">
            <div class="movie-poster col-md-3">
              <img class="movie-thumb"
                src="{{ asset('/uploads/movie/'.$movie -> image) }}"
                alt="{{ $movie -> title }}">
              @if (isset($episode_first)) 
                <div class="bwa-content">
                  <div class="loader"></div>
                  @if ($episode_current_list_count > 1)
                    <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_first->episode)}}" class="bwac-btn">
                      <i class="fa fa-play"></i>
                    </a>
                  @else
                    <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_first->episode)}}" class="bwac-btn">
                      <i class="fa fa-play"></i>
                    </a>
                  @endif
                </div>
              @endif
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
                      Trailer
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
                  <span>Thời lượng</span> : {{ $movie -> thoiluong }} Phút
                </li>
                @if ($movie -> thuocphim != "phim lẻ" )
                  <li class="list-info-group-item">
                    <span>Số tập</span> : {{ $episode_current_list_count }} / {{ $movie -> sotap }} - 
                    @if ($episode_current_list_count == $movie -> sotap ) 
                      hoàn thành
                    @else
                      đang cập nhật
                    @endif
                  </li>
                @endif
                <li class="list-info-group-item">
                  <span>Danh mục</span> :
                  <a href="{{route('category',$movie -> category -> slug)}}" rel="category tag">
                    {{ $movie -> category -> title }}
                  </a>
                </li>
                <li class="list-info-group-item">
                  <span>Thể loại</span> : 
                  @foreach ($movie -> movie_genre as $gen)
                    <a href="{{route('genre',$gen -> slug)}}" rel="category tag">
                      {{ $gen -> title }},
                    </a>
                  @endforeach
                  <a href="{{route('footage',$movie -> thuocphim)}}" rel="category tag">
                    {{ $movie -> thuocphim }}
                  </a>
                </li>
                <li class="list-info-group-item">
                  <span>Quốc gia</span> : 
                  <a href="{{route('country',$movie -> country -> slug)}}" rel="tag">
                    {{ $movie -> country -> title }}
                  </a>
                </li>
                @if ($movie -> actor != NULL) 
                  <li class="list-info-group-item last-item"
                    style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;">
                    <span>Diễn viên</span> : 
                    @php
                      $actors = array();
                      $actors = explode(',',$movie -> actor);
                    @endphp
      
                    @foreach ($actors as $actor) 
                      <a href="" rel="nofollow" title="{{ $actor }}">{{ $actor }}</a>,
                    @endforeach
                  </li>
                @endif
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
                {!! $movie -> trailer !!}
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