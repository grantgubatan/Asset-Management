<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.css">
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootswatch.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    {!! Charts::styles() !!}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
          <a class="navbar-brand pull-left" rel="home" href="/">
            <img style="max-width:200px; margin-top: -5px;" src="{{ url('/') }}/ingram.png">
          </a>
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  <i class="fa fa-align-justify"></i>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li>
                                    <a href="#">
                                    <i class="fa fa-database fa-lg"></i> Asset Management v1.0
                                    </a>
                                  </li>
                                  <hr>
                                  <li>
                                    <a href="{{url('home')}}">
                                    <i class="fa fa-home fa-lg"></i> Home
                                    </a>
                                  </li>

                                  <li>
                                    <a href="{{url('deliveries')}}"><i class="fa fa-truck fa-lg"></i> Deliveries</a>
                                  </li>

                                  <li>
                                    <a href="{{url('inventory')}}"><i class="fa fa-dropbox fa-lg"></i> Inventory</a>
                                  </li>

                                  <li>
                                    <a href="{{url('deployed')}}"><i class="fa fa-users fa-lg"></i> Deployed</a>
                                  </li>

                                    <hr>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div style="margin-top:100px">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
    $(document).ready(function()
    {
      $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

      if ($('#status').val() === 'Deployed')
      {
          $('#assignto').removeClass("hidden");
      }
      else
      {
          $('#assignto').addClass("hidden");
      }

      $('#status').change(function()
      {
        if ($(this).val() === 'Deployed')
        {
            $('#assignto').removeClass("hidden");
        }
        else
        {
            $('#assignto').addClass("hidden");
        }
      });

      $('#select-all').click(function(event) {
        if(this.checked)
        {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        }
        else
        {
          // Iterate each checkbox
          $(':checkbox').each(function() {
              this.checked = false;
          });
        }
    });

      $('#search').on('keyup', function(){
        $value = $('#search').val();

        $.ajax({
          type: 'GET',
          url: "{{url('search')}}",
          data: {'search':$value},
          success: function(data)
          {

            $('tbody').html(data);

          }
        });
      });

      $('#search2').on('keyup', function(){
        $value2 = $('#search2').val();

        $.ajax({
          type: 'GET',
          url: "{{url('searchUser')}}",
          data: {'search2':$value2},
          success: function(data2)
          {

            $('tbody').html(data2);

          }
        });
      });

      /* IN ALL */
      $('.inAll').on('click', function(e) {

        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)
        {
            alert("Please select row.");
        }  else {

            var check = confirm("Put all selected in Invetory?");
            if(check == true){
               e.preventDefault();
                var join_selected_values = allVals.join(",");

                $.ajax({
                    url: $(this).data('url'),
                    type: 'PUT',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            location.reload();
                        } else if (data['error']) {
                            location.reload();
                        } else {
                            location.reload();
                        }
                    },
                    error: function (data) {
                        location.reload();
                    }
                });

              $.each(allVals, function( index, value ) {
                  $('table tr').filter("[data-row-id='" + value + "']").remove();
              });
            }
        }
    });
    /* END IN ALL */

    /* DELIVERY ALL */
    $('.dAll').on('click', function(e) {

      var allVals = [];
      $(".sub_chk:checked").each(function() {
          allVals.push($(this).attr('data-id'));
      });

      if(allVals.length <=0)
      {
          alert("Please select row.");
      }  else {

          var check = confirm("Put all selected in Delivery?");
          if(check == true){
             e.preventDefault();
              var join_selected_values = allVals.join(",");

              $.ajax({
                  url: $(this).data('url'),
                  type: 'PUT',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  data: 'ids='+join_selected_values,
                  success: function (data) {
                      if (data['success']) {
                          $(".sub_chk:checked").each(function() {
                              $(this).parents("tr").remove();
                          });
                          location.reload();
                      } else if (data['error']) {
                          location.reload();
                      } else {
                          location.reload();
                      }
                  },
                  error: function (data) {
                      location.reload();
                  }
              });

            $.each(allVals, function( index, value ) {
                $('table tr').filter("[data-row-id='" + value + "']").remove();
            });
          }
      }
  });
  /* END DELIVERY ALL */


      /* DELETE ALL */
      $('.deleteAll').on('click', function(e) {

        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)
        {
            alert("Please select row.");
        }  else {

            var check = confirm("Are you sure you want to delete this row?");
            if(check == true){
               e.preventDefault();
                var join_selected_values = allVals.join(",");

                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            location.reload();
                        } else if (data['error']) {
                            location.reload();
                        } else {
                            location.reload();
                        }
                    },
                    error: function (data) {
                        location.reload();
                    }
                });

              $.each(allVals, function( index, value ) {
                  $('table tr').filter("[data-row-id='" + value + "']").remove();
              });
            }
        }
    });
    /* END DELETE ALL */

    });

    @if(Session::has('message'))
              var type="{{Session::get('alert-type','info')}}";

              switch(type){
                  case 'info':
                      toastr.options = {
                        "positionClass": "toast-bottom-right",

                      }
                       toastr.info("{{ Session::get('message') }}");
                       break;
                  case 'success':
                      toastr.options = {
                        "positionClass": "toast-bottom-right",

                      }
                      toastr.success("{{ Session::get('message') }}");
                      break;
                  case 'warning':
                      toastr.options = {
                        "positionClass": "toast-bottom-right",

                      }
                      toastr.warning("{{ Session::get('message') }}");
                      break;
                  case 'error':
                      toastr.options = {
                        "positionClass": "toast-bottom-right",

                      }
                      toastr.error("{{ Session::get('message') }}");
                      break;
              }
    @endif
    </script>
</body>
</html>
