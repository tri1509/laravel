@extends('layouts.app')
@section('content')
<div class="container">
  <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm phim</a>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <table class="table table-hover" id="table-phim">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Hot</th>
            <th scope="col">Description</th>
            <th scope="col">Active</th>
            <th scope="col">Country</th>
            <th scope="col">Genre</th>
            <th scope="col">Caterory</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="order_position">
        @foreach($list as $key => $cate)
          <tr id="{{ $cate -> id }}">
            <th scope="row">{{$key}}</th>
            <td>{{$cate -> title}}</td>
            <td>
              <img src="{{ asset('/uploads/movie/'.$cate -> image) }}" alt="" width="100">
            </td>
            <td>
              @if($cate -> phim_hot == 0)
                Không
              @else
                Có
              @endif
            </td>
            <td>{{$cate -> description}}</td>
            <td>
              @if($cate -> status)
                Hiển thị
              @else
                Ẩn
              @endif
            </td>
            <td>{{ $cate -> country -> title }}</td>
            <td>{{ $cate -> genre -> title }}</td>
            <td>{{ $cate -> category -> title }}</td>
            <td style="display:flex">
              {!! Form::open(
                [
                  'method' => 'DELETE', 
                  'route' => ['movie.destroy',$cate -> id],
                  'onsubmit' => 'return confirm("Bạn có muốn xoá không ?")', 
                ]
              ) !!}
                {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
                </div>
              {!! Form::close() !!}
              <i style="margin:0 5px"> | </i>
              <a href="{{ route('movie.edit',$cate -> id) }}" class="btn btn-warning">Sửa</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection