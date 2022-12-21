@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm phim</a>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <table class="table table-striped table-hover align-middle" id="table-phim">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Hình</th>
            <th scope="col">Phim Hot</th>
            <th scope="col">Định dạng</th>
            <th scope="col">Phụ đề</th>
            <th scope="col">Đường dẫn</th>
            <th scope="col">Active</th>
            <th scope="col">Quốc gia</th>
            <th scope="col">Thể loại</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Ngày cập nhật</th>
            <th scope="col">Năm</th>
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
            <td>
              @if($cate -> resolution == 0)
                HD
              @elseif($cate -> resolution == 1)
                SD
              @elseif($cate -> resolution == 2)
                HDCam
              @elseif($cate -> resolution == 3)
                Cam
              @elseif($cate -> resolution == 4)
                FullHD
              @endif
            </td>
            <td>
              @if($cate -> phude == 0)
                Phụ đề
              @else
                Thuyết minh
              @endif
            </td>
            <td>{{$cate -> slug}}</td>
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
            <td>{{ $cate -> ngaytao }}</td>
            <td>{{ $cate -> ngaycapnhat }}</td>
            <td>{!! Form::selectYear('year',1995,2020, isset($cate -> year) ? $cate -> year : '',
            [
              'class' => 'select-year form-control',
              'id' => $cate -> id,
              'style' => 'width:85px'
            ]) !!}</td>
            <td>
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
              <hr>
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