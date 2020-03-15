<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/images/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-signin-client_id" content="{{env('GOOGLE_CLIENT_ID')}}.googleusercontent.com">

    <title>@yield('title')</title>
    <meta content="@yield('description')" name="description"/>

    @if ( $app->environment('production') )
        <meta name="robots" content="index, follow">
    @else
        <meta name="robots" content="noindex, nofollow">
    @endif
    
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/96c3aa2e82.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css?rand=41') }}" rel="stylesheet">
    @yield('css')

    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
    <script>
        window.trans = <?php
        // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
        $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
        $trans = [];
        foreach ($lang_files as $f) {
            $filename = pathinfo($f)['filename'];
            $trans[$filename] = trans($filename);
        }
        echo json_encode($trans);
        ?>;
    </script>
    <script>
        var LoggedUser = false;
    </script>
    @yield('tinymce')
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>
    @if(!auth()->guest())
        <script>
            var LoggedUser = <?php echo json_encode(auth()->user()); ?>;
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif
    <script>
        window.Laravel.Locale = '<?php echo config('app.locale'); ?>';    
    </script>
    @yield('leaflet')
</head>
<body>
    <div id="app">
        @include('partials.nav')
       
        <main class="py-4" id="main">
            @yield('breadcrumbs')
            @yield('content')
        </main>
    </div>
    @include('partials.footer')
    <a href="javascript:" id="return-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script src="{{ asset('js/app.js?rand=41') }}" defer></script>

    <!-- Scripts -->
    @yield('scripts')
    

    @if($app->environment('production'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151388518-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-151388518-1');
        </script>

        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script>
            var OneSignal = window.OneSignal || [];
            OneSignal.push(function() {
                OneSignal.init({
                appId: "fa8c4c5b-fe48-4ed0-a13a-1e4d0578e659",
                });
            });
        </script>

        <!-- Hotjar Tracking Code for https://employmed.eu -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:1603858,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
    @endif
</body>
</html>
