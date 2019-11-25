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
    <link href="{{ asset('css/app.css?rand=13') }}" rel="stylesheet">
    @yield('css')
    <script src="https://cdn.tiny.cloud/1/oknjb9412whickdkirspmofjwrqudakcjhdvyf31s6xhshtt/tinymce/5/tinymce.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
      
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js'></script>

    <script>
        var LoggedUser = false;
        tinymce.init({
            selector: 'textarea',
            plugins: 'autoresize image',
            paste_data_images: true,
            extended_valid_elements: 'span[*]', // Needed to retain spans without attributes these are removed by default
            formats: {
                removeformat: [
                // Configures `clear formatting` to remove specified elements regardless of it's attributes
                { selector: 'b,strong,em,i,font,u,strike', remove: 'all' },

                // Configures `clear formatting` to remove the class red from spans and if the element then becomes empty i.e has no attributes it gets removed
                { selector: 'span', classes: 'red', remove: 'empty' },

                // Configures `clear formatting` to remove the class green from spans and if the element then becomes empty it's left intact
                { selector: 'span', classes: 'green', remove: 'none' }
                ]
            }
        });
    </script>
    <style>
        body {
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>
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
</head>
<body>
    <div id="app">
        <div class="d-flex" id="wrapper">
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">{{ __('EmployMed') }}</div>
                @include('partials.site-nav')
            </div>

            <div id="page-content-wrapper">
                @include('partials.nav')
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 py-2">
                            <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-clinic-medical"></i> {{ __('Menu') }}</button>
                        </div>
                    </div>
                </div>

                @yield('breadcrumbs')
                @yield('content')
                
            </div>
        </div>
        <a href="javascript:" id="return-to-top">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>
    @include('partials.footer')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    
    <!-- Scripts -->
    @yield('scripts')
    
    <script src="{{ asset('js/app.js?rand=13') }}" defer></script>
    
    @if($app->environment('production'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151388518-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-151388518-1');
        </script>
    @endif
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="https//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc7278fb46e12ce"></script>

    <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
    <script type="text/javascript">
        window.cookieconsent_options = {
            "message": "Na naszej stronie internetowej używamy plików cookies. Brak ograniczenia/wyłączenia cookies w&nbsp;przeglądarce internetowej oznacza zgodę na takie wykorzystanie. Szczegółowe informacje w&nbsp;naszej",
            "dismiss": "Akceptuję",
            "learnMore": "Polityce prywatności",
            "link": "/polityka-cookies",
            "theme": "dark-bottom",
            "target": "_blank"
        };
    </script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
    <!-- End Cookie Consent plugin -->
</body>
</html>
