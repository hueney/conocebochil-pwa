<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="favicon" href="{{asset('img/icon.png')}}">
        <link rel="apple-touch-icon" href="{{asset('img/icon.png')}}">
        <meta name="theme-color" content="#e82c33">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        @livewireStyles
        <!-- Styles Drop-->
        @yield('css')
         <!-- Styles Drop-->
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 ">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
         <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!--Script del cms--->
         @yield('javascript')
         <!--Script del cms--->
    </body>
</html>
