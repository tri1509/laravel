@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="text-center container">
    <a href="{{ route('movie.create') }}" class="btn btn-primary" style="width:100%">Quản lý tập phim</a>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <table class="table table-striped table-hover align-middle" id="table-phim">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Hình</th>
            <th scope="col">Thời lượng</th>
            <th scope="col">Số tập</th>
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
            <th scope="col">Top views</th>
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
            <td>{{ $cate -> thoiluong }} phút</td>
            <td>{{ $cate -> sotap }}</td>
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
            <td>
              @foreach ($cate -> movie_genre as $gen)
              <span class="badge badge-warning">{{ $gen -> title }}</span>
              @endforeach
            </td>
            <td>{{ $cate -> category -> title }}</td>
            <td>{{ $cate -> ngaytao }}</td>
            <td>{{ $cate -> ngaycapnhat }}</td>
            <td>{!! Form::selectYear('year',1995,2020, isset($cate -> year) ? $cate -> year : '',
            [
              'class' => 'select-year form-control',
              'id' => $cate -> id,
              'style' => 'width:85px'
            ]) !!}
            </td>
            <td>
              {!! Form::select('topview',
              [
                '2' => 'Tháng',
                '1' => 'Tuần',
                '0' => 'Ngày'
              ]
              ,isset($cate -> topview) ? $cate -> topview : '',
              [
                'class' => 'form-control select-topview',
                'id' => $cate -> id,
                'style' => 'width:100px'
              ]) !!}
            </td>
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