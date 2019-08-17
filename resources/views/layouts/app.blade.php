<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-signin-client_id" content="{{env('GOOGLE_CLIENT_ID')}}.googleusercontent.com">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    @yield('css')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    
    <link href="http://cdn.rawgit.com/Nodws/bootstrap4-tagsinput/master/tagsinput.css" rel="stylesheet" type="text/css">
    <script>
        tinymce.init({selector:'textarea'});
    </script>
</head>
<body>
    <div id="app">
        @include('partials.nav')
       
        <main class="py-4" id="main">
            @yield('breadcrumbs')
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/layout.js') }}"></script>
    
    <script src="http://cdn.rawgit.com/Nodws/bootstrap4-tagsinput/master/tagsinput.js"></script>
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
