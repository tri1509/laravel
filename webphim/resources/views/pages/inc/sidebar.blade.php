  <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    {{-- <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
      <div class="section-bar clearfix">
        <div class="section-title">
          <span>Phim hot</span>
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

            @foreach ($phim_hot_sidebar as $key => $e) 
              <div class="item post-37176">
                <a href="{{ route('movie',$e -> slug) }}" title="{{ $e -> title }}">
                  <div class="item-link">
                    <img src="{{ asset('/uploads/movie/'.$e -> image) }}"
                      class="lazy post-thumb" alt="{{ $e -> title }}" title="{{ $e -> title }}" />
                    <span class="is_trailer">
                      @if($e -> resolution == 0)
                        HD
                      @elseif($e -> resolution == 1)
                        SD
                      @elseif($e -> resolution == 2)
                        HDCam
                      @elseif($e -> resolution == 3)
                        Cam
                      @elseif($e -> resolution == 4)
                        FullHD
                      @endif
                    </span>
                  </div>
                  <p class="title">{{ $e -> title }}</p>
                </a>
                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                <div style="float: left;">
                  <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                  </span>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </section>
      <div class="clearfix"></div>
    </div> --}}
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
      <div class="section-bar clearfix">
        <div class="section-title">
          <span>Top Views</span>
          <ul class="halim-popular-tab" role="tablist">
            <li role="presentation" class="active">
              <a class="" role="tab" data-toggle="tab" data-showpost="10" data-type="ngay" href="#ngay">Ngày</a>
            </li>
            <li role="presentation">
              <a class="" role="tab" data-toggle="tab" data-showpost="10" data-type="tuan" href="#tuan">Tuần</a>
            </li>
            <li role="presentation">
              <a class="" role="tab" data-toggle="tab" data-showpost="10" data-type="thang" href="#thang">Tháng</a>
            </li>
          </ul>
        </div>
      </div>
      <section class="tab-content">
        <div role="tabpanel" class="tab-pane active halim-ajax-popular-post popular-post" id="ngay" aria-labelledby="home-tab">
          <div id="halim-ajax-popular-post" class="popular-post">

            @foreach ($topview_day as $key => $day) 
              <div class="item post-37176">
                <a href="{{ route('movie',$day -> slug) }}" title="{{ $day -> title }}">
                  <div class="item-link">
                    <img src="{{ asset('/uploads/movie/'.$day -> image) }}"
                      class="lazy post-thumb" alt="{{ $day -> title }}" title="{{ $day -> title }}" />
                    <span class="is_trailer">
                      @if($day -> resolution == 0)
                        HD
                      @elseif($day -> resolution == 1)
                        SD
                      @elseif($day -> resolution == 2)
                        HDCam
                      @elseif($day -> resolution == 3)
                        Cam
                      @elseif($day -> resolution == 4)
                        FullHD
                      @endif
                    </span>
                  </div>
                  <p class="title">{{ $day -> title }}</p>
                </a>
                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                <div style="float: left;">
                  <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                  </span>
                </div>
              </div>
            @endforeach

          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade halim-ajax-popular-post popular-post" id="tuan" aria-labelledby="home-tab">
          <div id="halim-ajax-popular-post" class="popular-post">

            @foreach ($topview_tuan as $key => $tuan) 
              <div class="item post-37176">
                <a href="{{ route('movie',$tuan -> slug) }}" title="{{ $tuan -> title }}">
                  <div class="item-link">
                    <img src="{{ asset('/uploads/movie/'.$tuan -> image) }}"
                      class="lazy post-thumb" alt="{{ $tuan -> title }}" title="{{ $tuan -> title }}" />
                    <span class="is_trailer">
                      @if($tuan -> resolution == 0)
                        HD
                      @elseif($tuan -> resolution == 1)
                        SD
                      @elseif($tuan -> resolution == 2)
                        HDCam
                      @elseif($tuan -> resolution == 3)
                        Cam
                      @elseif($tuan -> resolution == 4)
                        FullHD
                      @endif
                    </span>
                  </div>
                  <p class="title">{{ $tuan -> title }}</p>
                </a>
                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                <div style="float: left;">
                  <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                  </span>
                </div>
              </div>
            @endforeach

          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade halim-ajax-popular-post popular-post" id="thang" aria-labelledby="home-tab">
          <div id="halim-ajax-popular-post" class="popular-post">

            @foreach ($topview_thang as $key => $thang) 
              <div class="item post-37176">
                <a href="{{ route('movie',$thang -> slug) }}" title="{{ $thang -> title }}">
                  <div class="item-link">
                    <img src="{{ asset('/uploads/movie/'.$thang -> image) }}"
                      class="lazy post-thumb" alt="{{ $thang -> title }}" title="{{ $thang -> title }}" />
                    <span class="is_trailer">
                      @if($thang -> resolution == 0)
                        HD
                      @elseif($thang -> resolution == 1)
                        SD
                      @elseif($thang -> resolution == 2)
                        HDCam
                      @elseif($thang -> resolution == 3)
                        Cam
                      @elseif($thang -> resolution == 4)
                        FullHD
                      @endif
                    </span>
                  </div>
                  <p class="title">{{ $thang -> title }}</p>
                </a>
                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                <div style="float: left;">
                  <span class="user-rate-image post-large-rate stars-large-vang"
                    style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                  </span>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </section>
      <div class="clearfix"></div>
    </div>
  </aside>
