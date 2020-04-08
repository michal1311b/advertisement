<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.layouts-header')
    <!-- Styles -->
    <link href="{{ asset('css/app.css?rand=68') }}" rel="stylesheet">
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
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
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
</head>
<body class="{{ $theme . '-theme' }}">
    <div id="app">
        <div class="d-flex" id="wrapper">
            <div class="{{ 'bg-' . $theme }} side-nav border-right" id="sidebar-wrapper">
                <div class="sidebar-heading side-nav {{ $theme . '-theme' }}">{{ __('EmployMed') }}</div>
                @include('partials.site-nav')
            </div>

            <div id="page-content-wrapper">
                @include('partials.nav')
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 py-2">
                            <button class="btn btn-rounded btn-primary" id="menu-toggle"><i class="fas fa-clinic-medical"></i> {{ __('Menu') }}</button>
                        </div>
                    </div>
                </div>

                @yield('breadcrumbs')
                @yield('content')
            </div>
        </div>
        <a href="javascript:" class="return-to-top">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>
    @include('partials.footer')
    <script src="{{ asset('js/app.js?rand=68') }}" defer></script>
    
    <!-- Scripts -->
    @yield('scripts')
    @if($app->environment('production'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151388518-1"></script>
        <script src="{{ asset('js/usedInViews/analytics.js') }}" defer></script>
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script src="{{ asset('js/usedInViews/oneSignal.js') }}" defer>

        <!-- Hotjar Tracking Code for https://employmed.eu -->
        <script src="{{ asset('js/usedInViews/hotjar.js') }}" defer></script>
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script src="{{ asset('js/usedInViews/fbMessenger.js') }}" defer></script>

        <!-- Your customer chat code -->
        <div class="fb-customerchat"
            attribution=setup_tool
            page_id="112311090238540"
            logged_in_greeting="{{ trans('sentence.logged-out-greeting') }}"
            logged_out_greeting="{{ trans('sentence.logged-in-greeting') }}">
        </div>
    @endif
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc7278fb46e12ce"></script>

    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <script type="text/javascript">
        window.cookieconsent_options = {
            "message": "{!! trans('sentence.cookie-message') !!}",
            "dismiss": "{{ trans('sentence.accept') }}",
            "learnMore": "{{ trans('sentence.cookies-policy') }}",
            "link": "/polityka-cookies",
            "theme": "dark-bottom",
            "target": "_blank"
        };
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
    <!-- End Cookie Consent plugin -->
</body>
</html>
