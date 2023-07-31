<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" type="text/css" href="{{url('assets/css/main.css')}}">
            <link rel="stylesheet" type="text/css" href="{{url('assets/css/util.css')}}">
                  <link rel="stylesheet" type="text/css" href="{{url('assets/css/account buyer.css')}}">
                        <link rel="stylesheet" type="text/css" href="{{url('assets/css/account broker.css')}}">



<link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}">

      <title>MrBroker | @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

   <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('assets/build/assets/app.ac31adfe.css') }}"> <script src="{{ asset('build/assets/app.d225c007.js') }}"></script>
</head>
<body>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
