@extends('layout')
@section('content')
<div class="row container" id="wrapper">
  <div class="halim-panel-filter">
    <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
      <div class="ajax"></div>
    </div>
  </div>
  <div class="col-xs-12 carausel-sliderWidget">
    <div id="halim_related_movies-2xx" class="wrap-slider">
      <div class="section-bar clearfix">
        <h3 class="section-title"><span>PHIM HOT</span></h3>
      </div>
      <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
        @foreach ($phim_hot as $key => $hot) 
          <article class="thumb grid-item post-38498">
            <div class="halim-item">
              <a class="halim-thumb" href="{{ route('movie',$hot -> slug) }}" title="{{ $hot -> title }}">
                <figure><img class="lazy img-responsive"
                    src="{{ asset('/uploads/movie/'.$hot -> image) }}"
                    alt="{{ $hot -> title }}" title="{{ $hot -> title }}"></figure>
                <span class="status">
                  @if($hot -> resolution == 0)
                    HD
                  @elseif($hot -> resolution == 1)
                    SD
                  @elseif($hot -> resolution == 2)
                    HDCam
                  @elseif($hot -> resolution == 3)
                    Cam
                  @elseif($hot -> resolution == 4)
                    FullHD
                  @endif
                </span>
                <span class="episode">
                  <i class="fa fa-play" aria-hidden="true"></i>
                  @if($hot -> phude == 0)
                    Phụ đề
                  @else
                    Thuyết minh
                  @endif
                </span>
                <div class="icon_overlay"></div>
                <div class="halim-post-title-box">
                  <div class="halim-post-title ">
                    <p class="entry-title">{{ $hot -> title }}</p>
                    <p class="original_title">{{ $hot -> name_eng }}</p>
                  </div>
                </div>
              </a>
            </div>
          </article>
        @endforeach
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">

    @foreach ($category_home as $key => $cate_home)
      <section id="halim-advanced-widget-2">
        <div class="section-heading">
          <a href="danhmuc.php" title="{{ $cate_home -> title }}">
            <span class="h-text">{{ $cate_home -> title }}</span>
          </a>
        </div>
        <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
          @foreach ($cate_home -> movie -> take(8) as $key => $mov)
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
              <div class="halim-item">
                <a class="halim-thumb" href="{{ route('movie',$mov -> slug) }}">
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
      </section>
      <div class="clearfix"></div>
    @endforeach

  </main>
  <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
      <div class="section-bar clearfix">
        <div class="section-title">
          <span>Top Views</span>
          <ul class="halim-popular-tab" role="tablist">
            <li role="presentation" class="active">
              <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
            </li>
            <li role="presentation">
              <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
            </li>
            <li role="presentation">
              <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
            </li>
            <li role="presentation">
              <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
            </li>
          </ul>
        </div>
      </div>
      <section class="tab-content">
        <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
          <div class="halim-ajax-popular-post-loading hidden"></div>
          <div id="halim-ajax-popular-post" class="popular-post">
            <div class="item post-37176">
              <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                <div class="item-link">
                  <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                    class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                  <span class="is_trailer">Trailer</span>
                </div>
                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
              </a>
              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
              <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                  style="display: block;/* width: 100%; */">
                  <span style="width: 0%"></span>
                </span>
              </div>
            </div>
            <div class="item post-37176">
              <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                <div class="item-link">
                  <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                    class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                  <span class="is_trailer">Trailer</span>
                </div>
                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
              </a>
              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
              <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                  style="display: block;/* width: 100%; */">
                  <span style="width: 0%"></span>
                </span>
              </div>
            </div>
            <div class="item post-37176">
              <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                <div class="item-link">
                  <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                    class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                  <span class="is_trailer">Trailer</span>
                </div>
                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
              </a>
              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
              <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                  style="display: block;/* width: 100%; */">
                  <span style="width: 0%"></span>
                </span>
              </div>
            </div>
            <div class="item post-37176">
              <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                <div class="item-link">
                  <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                    class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                  <span class="is_trailer">Trailer</span>
                </div>
                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
              </a>
              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
              <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                  style="display: block;/* width: 100%; */">
                  <span style="width: 0%"></span>
                </span>
              </div>
            </div>
            <div class="item post-37176">
              <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                <div class="item-link">
                  <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                    class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                  <span class="is_trailer">Trailer</span>
                </div>
                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
              </a>
              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
              <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                  style="display: block;/* width: 100%; */">
                  <span style="width: 0%"></span>
                </span>
              </div>
            </div>
            <div class="item post-37176">
              <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                <div class="item-link">
                  <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                    class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                  <span class="is_trailer">Trailer</span>
                </div>
                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
              </a>
              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
              <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                  style="display: block;/* width: 100%; */">
                  <span style="width: 0%"></span>
                </span>
              </div>
            </div>
            <div class="item post-37176">
              <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                <div class="item-link">
                  <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                    class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                  <span class="is_trailer">Trailer</span>
                </div>
                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
              </a>
              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
              <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang"
                  style="display: block;/* width: 100%; */">
                  <span style="width: 0%"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="clearfix"></div>
    </div>
  </aside>
</div>
<script>
  $(document).ready(function($) {
    var owl = $('#halim_related_movies-2');
    owl.owlCarousel({
      loop: true,
      margin: 15,
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
          items: 5
        }
      }
    })
  });
</script>
@endsection