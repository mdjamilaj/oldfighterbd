@php
$config = [
    'appName' => "Fighter",
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="{{ asset('img/logo2.png') }}" type="image/x-icon">
  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ mix('dist/css/main.css') }}">

  
</head>
<body>
  
  
  <div id="app">    

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script> 

  {{-- Load the application scripts --}}
  <script src="{{ mix('dist/js/app.js') }}"></script>

  
</body>
</html>
