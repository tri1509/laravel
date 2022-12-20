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
            <div class = "form-group">
              {!! Form::label('title' , 'Title' , []) !!}
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
              {!! Form::label('slug' , 'Slug' , []) !!}
              {!! Form::text('slug' , isset($movie) ? $movie -> slug : '' , 
                [
                  'class' => 'form-control',
                  'readonly' => 'readonly',
                  'id' => 'convert_slug'
                ]
              ) !!}
            </div>
            <div class = "form-group">
              {!! Form::label('description' , 'Description' , []) !!}
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
              {!! Form::label('category' , 'Category' , []) !!}
              {!! Form::select('category_id',$category, isset($movie) ? $movie -> category : '' ,
              [
                'class' => 'form-control',
              ]) !!}
            </div>
            <div class = "form-group">
              {!! Form::label('country' , 'Country' , []) !!}
              {!! Form::select('country_id', $country, isset($movie) ? $movie -> country : '' ,
              [
                'class' => 'form-control',
              ]) !!}
            </div>
            <div class = "form-group">
              {!! Form::label('genre' , 'Genre' , []) !!}
              {!! Form::select('genre_id',$genre, isset($movie) ? $movie -> genre : '' ,
              [
                'class' => 'form-control',
              ]) !!}
            </div>
            <div class = "form-group">
              {!! Form::label('hot' , 'Hot' , []) !!}
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
            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
              {!! Form::label('formFile', 'Image',['class' => 'form-label']) !!}
              {!! Form::file('image', ['required' => 'required','class' => 'form-control']) !!}
              <small class="text-danger">{{ $errors->first('photo') }}</small>

              @if (isset($movie))
                <img src="{{ asset('/uploads/movie/'.$movie -> image) }}" alt="" width="200">
              @endif

            </div>
          @if (!isset($movie))
            {!! Form::submit('Thêm vào', ['class' => 'btn btn-success pull-right']) !!}
          @else
            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success pull-right']) !!}
          @endif
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection