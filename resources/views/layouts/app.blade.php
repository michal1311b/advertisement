<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.layouts-header')

    <!-- Styles -->
    <link href="{{ asset('css/app.css?rand=64') }}" rel="stylesheet">
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
<body class="{{ $theme . '-theme' }}">
    <div id="app">
        @include('partials.nav')
       
        <main class="py-4" id="main">
            @yield('breadcrumbs')
            @yield('content')
        </main>
    </div>
    @include('partials.footer')
    <a href="javascript:" class="return-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script src="{{ asset('js/app.js?rand=64') }}" defer></script>

    <!-- Scripts -->
    @yield('scripts')

    @if($app->environment('production'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151388518-1"></script>
        <script src="{{ asset('js/usedInViews/analytics.js') }}" defer>

        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script src="{{ asset('js/usedInViews/oneSignal.js') }}" defer>

        <!-- Hotjar Tracking Code for https://employmed.eu -->
        <script src="{{ asset('js/usedInViews/hotjar.js') }}" defer></script>
    @endif
</body>
</html>
