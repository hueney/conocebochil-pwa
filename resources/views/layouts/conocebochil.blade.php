<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/icon/icon_192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/icon/icon_32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/icon/icon_16.png')}}">
    
  <meta name="theme-color" content="#e82c33">
    @livewireStyles
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     <link rel="manifest" href="{{asset('manifest.json')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    @include('livewire.app.navfooter')
    @yield('content')
    @livewireScripts
    <script src="{{asset('assets/js/script.js')}}"></script>
    @yield('js')
    

</body>
</html>
