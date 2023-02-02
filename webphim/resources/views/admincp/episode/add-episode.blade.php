@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Quản lý tập phim</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          {!! Form::open(['route' => 'episode.store','method' => 'post']) !!}
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Bộ phim</span>
            </div>
            {!! Form::text('movie_title' , isset($movie) ? $movie -> title : '' ,
              [
                'class' => 'form-control',
                'readonly' => 'readonly'
              ]
            ) !!}
            {!! Form::hidden('movie_id' , isset($movie) ? $movie -> id : '') !!}
          </div>

          <div class="row">
            <div class="col-sm-4 col-12">
              <div class = "input-group mb-3">
                <div class="input-group-prepend">
                  {!! Form::label('episode' , 'Tập phim' , ['class' => 'input-group-text']) !!}
                </div>
                {!! Form::selectRange('episode',1, $movie -> sotap, isset($tap_cao_nhat) ?$tap_cao_nhat -> episode + 1 : '',
                [
                  'class' => 'form-control',
                ]) !!}
              </div>
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
    <div class="col-md-12">
      <table class="table table-hover" id="table-phim">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên phim</th>
            <th scope="col">Tập phim</th>
            <th scope="col">Link</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="order_position">
        @foreach($list_episode as $key => $episode)
          <tr id="{{ $episode -> id }}">
            <th scope="row">{{$key}}</th>
            <td class='font-weight-bold text-info'>{{$episode -> movie -> title}}</td>
            <td class="badge badge-warning">{{$episode -> episode}}</td>
            <td width='100'>{{$episode -> link}}</td>
            <td style="display:flex">
              {!! Form::open(
                [
                  'method' => 'DELETE', 
                  'route' => ['episode.destroy',$episode -> id],
                  'onsubmit' => 'return confirm("Bạn có muốn xoá không ?")', 
                ]
              ) !!}
                {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
                </div>
              {!! Form::close() !!}
              <i style="margin:0 5px"> | </i>
              <a href="{{ route('episode.edit',$episode -> id) }}" class="btn btn-warning">Sửa</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection