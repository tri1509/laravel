@extends('layouts.app')
@section('content')
<div class="container">
  <div class="text-center container mb-3 mt-3">
    <a href="{{ route('episode.create') }}" class="btn btn-primary" style="width:100%">Thêm tập phim</a>
  </div>
  <div class="row justify-content-center">
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
            <td class="badge badge-warning">
              @if ($episode -> episode == 0)
              Phim lẻ
              @else
                {{$episode -> episode}}
              @endif
            </td>
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