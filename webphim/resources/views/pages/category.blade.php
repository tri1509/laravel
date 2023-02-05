@extends('layout')
@section('content')
<div class="row container" id="wrapper">
  <div class="halim-panel-filter">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-12">
          <div class="yoast_breadcrumb hidden-xs">
            <span><span>
              <a href="">{{ $cate_slug -> title }}</a>
              @for ($y = 1995; $y <= 2020; $y ++)  
              » <span class="breadcrumb_last" aria-current="page">
                <a href="{{ url('nam-'.$y) }}" title="Năm {{ $y }}">{{ $y }}</a>
              </span>
              @endfor
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
    <section>
      <div class="section-bar clearfix">
        <h1 class="section-title"><span>{{ $cate_slug -> title }}</span></h1>
      </div>
      <div class="section-bar clearfix">
        <form action="{{ route('locphim') }}" method="get">
          @csrf
          <div class="col-md-3">
            <div class="form-group">
              <select name="order" class="form-control" id="exampleFormControlSelect1">
                <option>---Sắp xếp---</option>
                <option value="date">Ngày đăng</option>
                <option value="year_release">Năm sản xuất</option>
                <option value="name_a_z">Tên Phim</option>
                <option value="watch_views">Lượt xem</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <select name="genre" class="form-control" id="exampleFormControlSelect1">
                <option>---Thể loại---</option>
                @foreach($genre as $key => $gen_filter)
                  <option value="{{ $gen_filter -> id }}">{{ $gen_filter -> title }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <select name="country" class="form-control" id="exampleFormControlSelect1">
                <option>---Quốc gia---</option>
                @foreach($country as $key => $coun_filter)
                  <option value="{{ $coun_filter -> id }}">{{ $coun_filter -> title }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              {!! Form::selectYear('year',2010,2022,null,['class' => 'form-control']) !!}
            </div>
          </div>
          <input type="submit" name="locphim" value="Lọc Phim" class="btn btn-default">
        </form>
      </div>
      <div class="halim_box">

        @foreach ($movie as $key => $mov) 
          <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
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
                    Phụ đề - {{ $mov -> sotap }} tập
                  @else
                    Thuyết minh - {{ $mov -> sotap }} tập
                  @endif
                </span>
                <div class="icon_overlay"></div>
                <div class="halim-post-title-box">
                  <div class="halim-post-title ">
                    <p class="entry-title text-capitalize">{{ $mov -> title }}</p>
                    <p class="original_title">{{ $mov -> name_eng }}</p>
                  </div>
                </div>
              </a>
            </div>
          </article>
        @endforeach

      </div>
      <div class="clearfix"></div>
      <div class="text-center">
        {{-- <ul class='page-numbers'>
          <li><span aria-current="page" class="page-numbers current">1</span></li>
          <li><a class="page-numbers" href="">2</a></li>
          <li><a class="page-numbers" href="">3</a></li>
          <li><span class="page-numbers dots">&hellip;</span></li>
          <li><a class="page-numbers" href="">55</a></li>
          <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
        </ul> --}}
        {{ $movie -> links("pagination::bootstrap-4") }}
      </div>
    </section>
  </main>
  
  @include('pages.inc.sidebar')

</div>
@endsection