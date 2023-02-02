@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">Quản lý thể loại</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if (!isset($genre))
          {!! Form::open(['route' => 'genre.store','method' => 'post']) !!}
          @else 
          {!! Form::open(['route' => ['genre.update',$genre -> id],'method' => 'put']) !!}
          @endif
            <div class = "form-group">
              {!! Form::label('title' , 'Title' , []) !!}
              {!! Form::text('title' , isset($genre) ? $genre -> title : '' , 
                [
                  'class' => 'form-control',
                  'placeholder' => 'Nhập vào dữ liệu....',
                  'id' => 'slug',
                  'onkeyup' => 'ChangeToSlug()'
                ]
              ) !!}
            </div>
            <div class = "form-group">
              {!! Form::label('slug' , 'Slug' , []) !!}
              {!! Form::text('slug' , isset($genre) ? $genre -> slug : '' , 
                [
                  'class' => 'form-control',
                  'placeholder' => 'Nhập vào dữ liệu....',
                  'readonly' => 'readonly',
                  'id' => 'convert_slug'
                ]
              ) !!}
            </div>
            <div class = "form-group">
              {!! Form::label('description' , 'Description' , []) !!}
              {!! Form::textarea('description' , isset($genre) ? $genre -> description : '' , 
                [
                  'class' => 'form-control',
                  'placeholder' => 'Nhập vào dữ liệu....',
                  'id' => 'description',
                  'style' => 'resize:none'
                ]
              ) !!}
            </div>
            <div class = "form-group">
              {!! Form::select('status',
              [
                '1' => 'Hiển thị',
                '0' => 'Ẩn'
              ]
              ,isset($genre) ? $genre -> status : null,
              [
                'class' => 'form-control',
                'aria-label' => 'Default select example'
              ]) !!}
            </div>
          @if (!isset($genre))
            {!! Form::submit('Thêm vào', ['class' => 'btn btn-success pull-right']) !!}
          @else
            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success pull-right']) !!}
          @endif
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <table class="table table-hover" id="table-phim">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Active</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($list as $key => $cate)
          <tr>
            <th scope="row">{{$key}}</th>
            <td>{{$cate -> title}}</td>
            <td>{{$cate -> slug}}</td>
            <td>
              @if($cate -> status)
                Hiển thị
              @else
                Ẩn
              @endif
            </td>
            <td style="display:flex">
              {!! Form::open(
                [
                  'method' => 'DELETE', 
                  'route' => ['genre.destroy',$cate -> id],
                  'onsubmit' => 'return confirm("Bạn có muốn xoá không ?")', 
                ]
              ) !!}
                {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
                </div>
              {!! Form::close() !!}
              <i style="margin:0 5px"> | </i>
              <a href="{{ route('genre.edit',$cate -> id) }}" class="btn btn-warning">Sửa</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection