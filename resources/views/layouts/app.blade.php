<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css'])

        @yield('style')
    </head>
    <body class="bg-gray-100">

      <!-- Wrapper -->
      <div class="flex h-screen">
        @include('layouts.sidebar')
        <div class="flex-1 flex flex-col overflow-hidden">
          @include('layouts.header')

          <!-- Content -->
          <main class="flex-1 p-6 bg-gray-100">
            @yield('content')
          </main>
        </div>
      </div>
        @yield('script')
    </body>
</html>
