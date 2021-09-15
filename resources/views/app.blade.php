
<!-- <head> -->
<!--     <meta charset="utf-8"> -->
<!--     <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- CSRF Token -->
<!--     <meta name="csrf-token" content="{{ csrf_token() }}"> -->
<!--         <title>{{ config('app.name', 'Vue Laravel SPA') }}</title> -->
     <!-- Styles -->
<!--      <link href="{{ mix('/css/app.css') }}" rel="stylesheet"> -->
<!-- </head> -->
<!-- <body> -->
<!-- <div id="app"> -->
<!-- 	<header-component></header-component> -->
<!-- 	<router-view></router-view> -->
<!-- </div> -->

<!-- <script src="{{ mix('/js/app.js') }}" defer></script> -->
<!-- </body> -->
<!-- </html> -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>LaravelSPA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ mix('/public/css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
   <app></app>
</div>
<script src="{{ mix('/public/js/app.js') }}"></script>
</body>
</html>