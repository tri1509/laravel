<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <main class="py-4">

      @if(Auth::id())
      <div class="container">
        @include('layouts.navbar')
      </div>
      @endif

      @yield('content')
    </main>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript">
function ChangeToSlug() {
  var slug;
  //L???y text t??? th??? input title 
  slug = document.getElementById("slug").value;
  slug = slug.toLowerCase();
  //?????i k?? t??? c?? d???u th??nh kh??ng d???u
  slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
  slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
  slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
  slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
  slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
  slug = slug.replace(/??|???|???|???|???/gi, 'y');
  slug = slug.replace(/??/gi, 'd');
  //X??a c??c k?? t??? ?????t bi???t
  slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
  //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
  slug = slug.replace(/ /gi, "-");
  //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
  //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
  slug = slug.replace(/\-\-\-\-\-/gi, '-');
  slug = slug.replace(/\-\-\-\-/gi, '-');
  slug = slug.replace(/\-\-\-/gi, '-');
  slug = slug.replace(/\-\-/gi, '-');
  //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
  slug = '@' + slug + '@';
  slug = slug.replace(/\@\-|\-\@|\@/gi, '');
  //In slug ra textbox c?? id ???slug???
  document.getElementById('convert_slug').value = slug;
}
</script>
<script>
  $( function() {
    $( ".order_position" ).sortable({
      placeholder: 'ui-state-highlight',
      update: function(event,ui){
        var array_id = [];
        $( ".order_position tr" ).each(function(){
          array_id.push($(this).attr('id'))
        })
        $.ajax({
          headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{ route('resorting') }}",
          method :"POST",
          data: {array_id:array_id},
          success:function(data){
            alert('s???p x???p th??nh c??ng !');
          }
        })
      }
    });

    $('#table-phim').DataTable();

    $('.select-year').change(function(){
      var year = $(this).find(':selected').val();
      var id_phim = $(this).attr('id');
      $.ajax({
        url: "{{ url('/update-year-phim') }}",
        method: "GET",
        data: { year: year, id_phim: id_phim },
        success: function() {
          alert('Thay ?????i phim theo n??m ' + year + ' th??nh c??ng');
        }
      });
    });

    $('.select-topview').change(function(){
      var topview = $(this).find(':selected').val();
      var id_phim = $(this).attr('id');
      if(topview == 0){
        var text = "Ng??y";
      }else if(topview == 1){
        var text = "Tu???n";
      }else{
        var text = "Th??ng";
      }
      $.ajax({
        url: "{{ url('/update-topview-phim') }}",
        method: "GET",
        data: { topview: topview, id_phim: id_phim },
        success: function() {
          alert('Phim hot theo ' + text);
        }
      });
    });

    $('.select-movie').change(function(){
    var id = $(this).find(':selected').val();
    $.ajax({
      url: "{{ route('select-movie') }}",
      method: "GET",
      data: { id: id},
      success: function(data) {
        $("#episode").html(data);
      }
      });
    })
  });
</script>
</html>