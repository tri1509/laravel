@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <a href="{{ route('movie.index') }}" class="btn btn-primary">Liệt kê phim</a>
        <div class="card-header">Quản lý phim</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if (!isset($movie))
          {!! Form::open(['route' => 'movie.store','method' => 'post','enctype' => 'multipart/form-data']) !!}
          @else 
          {!! Form::open(['route' => ['movie.update',$movie -> id],'method' => 'put','enctype' => 'multipart/form-data']) !!}
          @endif
          <div class="row">
            <div class="col-6">
              <div class = "form-group">
                {!! Form::label('title' , 'Tên phim' , []) !!}
                {!! Form::text('title' , isset($movie) ? $movie -> title : '' , 
                  [
                    'class' => 'form-control',
                    'placeholder' => 'Nhập vào dữ liệu....',
                    'id' => 'slug',
                    'onkeyup' => 'ChangeToSlug()'
                  ]
                ) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('slug' , 'Đường dẫn' , []) !!}
                {!! Form::text('slug' , isset($movie) ? $movie -> slug : '' , 
                  [
                    'class' => 'form-control',
                    'readonly' => 'readonly',
                    'id' => 'convert_slug'
                  ]
                ) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('name_eng' , 'Tên tiếng anh' , []) !!}
                {!! Form::text('name_eng' , isset($movie) ? $movie -> name_eng : '' , 
                  [
                    'class' => 'form-control',
                    'placeholder' => 'Nhập vào dữ liệu....',
                    'id' => 'name_eng',
                  ]
                ) !!}
              </div>
              
              <div class = "form-group">
                {!! Form::label('description' , 'Nội dung' , []) !!}
                {!! Form::textarea('description' , isset($movie) ? $movie -> description : '' , 
                  [
                    'class' => 'form-control',
                    'placeholder' => 'Nhập vào dữ liệu....',
                    'id' => 'description',
                    'style' => 'resize:none'
                  ]
                ) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('tags' , 'Tags phim' , []) !!}
                {!! Form::textarea('tags' , isset($movie) ? $movie -> tags : '' , 
                  [
                    'class' => 'form-control',
                    'placeholder' => 'Nhập vào dữ liệu....',
                    'id' => 'tags',
                    'style' => 'resize:none'
                  ]
                ) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('trailer' , 'Trailer' , []) !!}
                {!! Form::text('trailer' , isset($movie) ? $movie -> trailer : '' , 
                  [
                    'class' => 'form-control',
                    'placeholder' => '<iframe width="1140" height="641" src="https://www.youtube.com/embed/',
                    'id' => 'trailer',
                  ]
                ) !!}
              </div>
            </div>
  
            <div class="col-6">
              <div class="row">
                <div class="col-4">
                  <div class = "form-group">
                    {!! Form::label('genre' , 'Thể loại' , []) !!}<br>
                    @foreach ($list_genre as $key => $gen)  
                      @if (isset($movie))
                        {!! Form::checkbox('genre[]',$gen -> id,isset($movie_genre) && $movie_genre -> contains($gen -> id) ? true : false) !!}
                      @else
                        {!! Form::checkbox('genre[]',$gen -> id,'',['id' => $gen -> title]) !!}
                      @endif

                      {!! Form::label($gen -> title, $gen->title, []) !!}<br>
                    @endforeach
                  </div>
                </div>
                <div class="col-8">
                  <div class = "form-group">
                    {!! Form::label('sotap' , 'Số tập phim' , []) !!}
                    {!! Form::text('sotap' , isset($movie) ? $movie -> sotap : '' , 
                      [
                        'class' => 'form-control',
                        'placeholder' => 'Nhập vào dữ liệu....',
                        'id' => 'sotap',
                      ]
                    ) !!}
                  </div>
                  <div class = "form-group">
                    {!! Form::label('thoiluong' , 'Thời lượng phim (phút)' , []) !!}
                    {!! Form::text('thoiluong' , isset($movie) ? $movie -> thoiluong : '' , 
                      [
                        'class' => 'form-control',
                        'placeholder' => 'Nhập vào dữ liệu....',
                        'maxlength' => '3'
                      ]
                    ) !!}
                  </div>
                  <div class = "form-group">
                    {!! Form::label('phude' , 'Phụ đề' , []) !!}
                    {!! Form::select('phude',
                    [
                      '1' => 'Thuyết minh',
                      '0' => 'Phụ đề'
                    ], 
                    isset($movie) ? $movie -> phude : '' ,
                    [
                      'class' => 'form-control',
                    ]) !!}
                  </div>
                </div>
              </div>
              
              <div class = "form-group">
                {!! Form::label('actor' , 'Diễn viên' , []) !!}
                {!! Form::text('actor' , isset($movie) ? $movie -> actor : '' , 
                  [
                    'class' => 'form-control',
                    'placeholder' => 'Cách nhau bởi dấu phẩy " , "',
                    'id' => 'actor',
                  ]
                ) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('thuocphim' , 'Thuộc thể loại phim' , []) !!}
                {!! Form::select('thuocphim',
                [
                  'phim lẻ' => 'Phim Lẻ',
                  'phim bộ' => 'Phim Bộ'
                ]
                ,isset($movie) ? $movie -> thuocphim : '',
                [
                  'class' => 'form-control',
                  'aria-label' => 'Default select example'
                ]) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('status' , 'Trạng thái' , []) !!}
                {!! Form::select('status',
                [
                  '1' => 'Hiển thị',
                  '0' => 'Ẩn'
                ]
                ,isset($movie) ? $movie -> status : null,
                [
                  'class' => 'form-control',
                  'aria-label' => 'Default select example'
                ]) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('category' , 'Danh mục' , []) !!}
                {!! Form::select('category_id',$category,isset($movie) ? $movie -> category_id :'',
                [
                  'class' => 'form-control',
                ]) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('country' , 'Quốc gia' , []) !!}
                {!! Form::select('country_id', $country, isset($movie) ? $movie -> country_id  : '' ,
                [
                  'class' => 'form-control',
                ]) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('hot' , 'Phim hot' , []) !!}
                {!! Form::select('phim_hot',
                [
                  '1' => 'Hot',
                  '0' => 'Không'
                ], 
                isset($movie) ? $movie -> phim_hot : '' ,
                [
                  'class' => 'form-control',
                ]) !!}
              </div>
              <div class = "form-group">
                {!! Form::label('resolution' , 'Định dạng' , []) !!}
                {!! Form::select('resolution',
                [
                  '4' => 'FullHD',
                  '3' => 'Cam',
                  '2' => 'Trailer',
                  '1' => 'SD',
                  '0' => 'HD'
                ], 
                isset($movie) ? $movie -> resolution : '' ,
                [
                  'class' => 'form-control',
                ]) !!}
              </div>
              
              <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                {!! Form::label('formFile', 'Image',['class' => 'form-label']) !!}
                {!! Form::file('image', ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('photo') }}</small>
    
                @if (isset($movie))
                  <img src="{{ asset('/uploads/movie/'.$movie -> image) }}" alt="" width="200">
                @endif
    
              </div>
            </div>
          </div>

          @if (!isset($movie))
            {!! Form::submit('Thêm vào', ['class' => 'btn btn-success pull-right w-100']) !!}
          @else
            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success pull-right w-100']) !!}
          @endif
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection