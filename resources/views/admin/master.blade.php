<!DOCTYPE html>
  <html  lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>@yield('title')</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{asset('css/app.css')}}" />
      <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/AdminLTE.min.css')}}" />
      <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/skins/_all-skins.min.css')}}" />
      <link rel="stylesheet" href="{{asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}" />
      <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}" />

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

      <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      @yield('styles')
    </head>
    <body  class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper" style="height: auto; min-height: 100%;">
          @include('admin.partials.header')
          @include('admin.partials.sidebar')
          @yield('content')
      </div>

      <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
      <script src="{{ asset('admin/js/app.js') }}"></script>
      @yield('scripts')
    </body>
</html>