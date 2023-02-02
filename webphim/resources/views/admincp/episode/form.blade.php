@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <a href="{{ route('episode.index') }}" class="btn btn-primary">Liệt kê tập phim</a>
        <div class="card-header">Quản lý tập phim</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if (!isset($episode))
          {!! Form::open(['route' => 'episode.store','method' => 'post']) !!}
          @else 
          {!! Form::open(['route' => ['episode.update',$episode -> id],'method' => 'put']) !!}
          @endif
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              {!! Form::label('movie' , 'Chọn phim' , ['class' => 'input-group-text']) !!}
            </div>
            {!! Form::select('movie_id',
            [
              '0' => 'Chọn Phim',
              'Phim' => $list_movie,
            ],isset($episode) ? $episode -> movie_id : '',
            ['class' => 'custom-select select-movie',]) !!}
          </div>

          <div class="row">
            <div class="col-sm-4 col-12">
              @if (!isset($episode))
                <div class = "input-group mb-3">
                  <div class="input-group-prepend">
                    {!! Form::label('episode' , 'Tập phim' , ['class' => 'input-group-text']) !!}
                  </div>
                  <select name="episode" class="custom-select" id="episode"></select>
                </div>
              @else
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Tập phim</span>
                  </div>
                  {!! Form::text('episode' , isset($episode) ? $episode -> episode : '' ,
                    [
                      'class' => 'form-control',
                      'readonly' => 'readonly'
                    ]
                  ) !!}
                </div>
              @endif
            </div>
            <div class="col-sm-8 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">Đường dẫn phim</span>
                </div>
                {!! Form::text('link' , isset($episode) ? $episode -> link : '' , 
                  [
                    'class' => 'form-control',
                    'placeholder' => 'Dán vào đường dẫn....',
                    'id' => 'basic-url',
                    'aria-describedby' => 'basic-addon3'
                  ]
                ) !!}
              </div>
            </div>
          </div>

          @if (!isset($episode))
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