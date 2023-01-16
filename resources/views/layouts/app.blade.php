<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css') }}">
         <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">



        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
                <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </head>
    <body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
            @include('layouts.navigation')
           
            <!-- Page Heading -->
            @if (isset($header))
            <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                       
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$header}}</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
            @endif
              
            <!-- Page Content -->
            <div class="content-wrapper">
                <section class="content" style="padding-top:20px">
                    <div class="container-fluid"> 
                @if (session('success'))
             
                    <script >
                        $(document).ready(function() {
                            // var error = {!! session('success') !!};
                             toastr.success('{!! session("success") !!}');
                          
                          });
                      </script>
            
                @endif
               
                @if (count($errors) > 0)
                @foreach ($errors as $error)  
                    
                    <script >
                        $(document).ready(function() {
                            var error = 
                             toastr.error('{!! $error !!}')
                          
                          });
                      </script>
                @endforeach
               @endif

               
                {{ $slot }}
            </div>
        </div>
    </section>
  </div>



<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
 
    </body>
</html>
