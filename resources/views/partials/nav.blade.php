<nav class="header-nav navbar navbar-expand-md {{ 'navbar-' . $theme }} {{ 'bg-' . $theme }} shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" class="w-100 logo bg-white" alt="EmployMed Logo"/>
        </a>
        <button class="navbar-toggler lang-dropdown bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto lang-dropdown {{ $theme . '-theme' }}">
                @php $locale = session()->get('locale'); @endphp
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle lang-dropdown {{ $theme . '-theme' }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ trans('sentence.language')}} <span class="caret"></span>
                    </a>
                    @switch($locale)
                        @case('en')
                        <img src="{{asset('images/uk.png')}}" width="20px" height="20x" alt="{{ trans('sentence.english')}} icon"> {{ trans('sentence.english')}}
                        @break
                        @case('ukr')
                        <img src="{{asset('images/ukr.png')}}" width="20px" height="20x" alt="{{ trans('sentence.ukrainian')}} icon"> {{ trans('sentence.ukrainian')}}
                        @break
                        @case('de')
                        <img src="{{asset('images/de.png')}}" width="20px" height="20x" alt="{{ trans('sentence.germany')}} icon"> {{ trans('sentence.germany')}}
                        @break
                        @default
                        <img src="{{asset('images/pl.png')}}" width="20px" height="20x" alt="{{ trans('sentence.polish')}} icon"> {{ trans('sentence.polish')}}
                    @endswitch
                    <div class="dropdown-menu dropdown-menu-right lang-dropdown {{ $theme . '-theme' }}" aria-labelledby="navbarDropdown">
                        <a class="side-nav dropdown-item lang-dropdown {{ $theme . '-theme' }}" href="{{ route('locale', 'en') }}" title="{{ trans('sentence.english')}}"><img src="{{asset('images/uk.png')}}" width="20px" height="20x"> {{ trans('sentence.english')}}</a>
                        <a class="side-nav dropdown-item lang-dropdown {{ $theme . '-theme' }}" href="{{ route('locale', 'ukr') }}" title="{{ trans('sentence.ukrainian')}}"><img src="{{asset('images/ukr.png')}}" width="20px" height="20x"> {{ trans('sentence.ukrainian')}}</a>
                        <a class="side-nav dropdown-item lang-dropdown {{ $theme . '-theme' }}" href="{{ route('locale', 'pl') }}" title="{{ trans('sentence.polish')}}"><img src="{{asset('images/pl.png')}}" width="20px" height="20x"> {{ trans('sentence.polish')}}</a>
                        <a class="side-nav dropdown-item lang-dropdown {{ $theme . '-theme' }}" href="{{ route('locale', 'de') }}" title="{{ trans('sentence.germany')}}"><img src="{{asset('images/de.png')}}" width="20px" height="20x"> {{ trans('sentence.germany')}}</a>
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <div class="custom-control custom-switch">
                        <input id="theme-toggle" type="checkbox" class="custom-control-input" {{ $theme == 'dark' ? 'checked' : '' }}>
                        <label class="custom-control-label" for="theme-toggle">
                            <i class="fas fa-{{ $theme == 'dark' ? 'sun' : 'moon' }} text-primary"></i>
                        </label>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company-list') }}" class="nav-link lang-dropdown {{ $theme . '-theme' }}" title="{{ trans('company.company-list') }}">{{ trans('company.company-list') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('advertisement-list') }}" class="nav-link lang-dropdown {{ $theme . '-theme' }}" title="{{ trans('offer.offers') }}">{{ trans('offer.offers') }}</a>
                </li>
                <li class="d-block d-md-none nav-item">
                    <a href="{{ route('foreign-list') }}" class="nav-link lang-dropdown {{ $theme . '-theme' }}" title="{{ trans('offer.foreigns-list') }}">{{ trans('offer.foreigns-list') }}</a>
                </li>
                @guest
                @else
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('company'))
                        <li class="d-none d-lg-block nav-item">
                            <a href="{{ route('create-advertisement') }}" class="btn btn-rounded btn-success" title="{{ trans('offer.offer-create-poland')}}">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </li>
                    @endif
                    @if(auth()->user()->hasRole('doctor') || auth()->user()->hasRole('nurse'))
                        <li class="nav-item">
                            <a href="{{ route('user-prefered-locations') }}" class="nav-link lang-dropdown {{ $theme . '-theme' }}" title="{{ trans('sentence.your-preferences')}}">{{ trans('sentence.your-preferences')}}</a>
                        </li>
                    @endif
                @endguest
                @guest
                    <li class="nav-item">
                        <a class="nav-link lang-dropdown {{ $theme . '-theme' }}" href="{{ route('login') }}" title="{{ trans('sentence.login') }}">{{ trans('sentence.login')}}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link lang-dropdown {{ $theme . '-theme' }}" href="{{ route('register.step') }}" title="{{ trans('sentence.register') }}">{{ trans('sentence.register')}}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle notification" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fas fa-envelope fa-2x"></i>
                            <span class="badge" id="badge-notify"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="notificationsMenu" id="notificationsMenu">
                            <li class="dropdown-header">{{ __('No notifications') }}</li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(auth()->user()->avatar)
                                <img src="{{ asset(auth()->user()->avatar) }}" alt="avatar" class="user-avatar user-avatar--smaller">
                            @endif
                            <span class="side-nav">{{ auth()->user()->name }}</span> <span class="caret"></span>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="side-nav dropdown-item" href="{{ route('edit-user', auth()->user()->id) }}" title="{{ trans('profile.user-profile')}}">{{ trans('profile.user-profile')}}</a>
                            <a class="side-nav dropdown-item {{ Request::is('user/rooms') ? 'text-white active' : null }}" href="{{ route('user-rooms') }}" title="{{ trans('profile.user-message')}}">{{ trans('profile.user-message')}}</a>
                            <a class="side-nav dropdown-item {{ Request::is('offer/list') ? 'text-white active' : null }}" href="{{ route('advertisement-list') }}" title="{{ trans('offer.offers-list')}}">{{ trans('offer.offers-list')}}</a>
                            
                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('company'))
                                <a class="side-nav dropdown-item {{ Request::is('user/offers') ? 'text-white active' : null }}" href="{{ route('user-advertisement-list') }}" title="{{ trans('offer.user-offers')}}">{{ trans('offer.user-offers')}}</a>
                                <a class="side-nav dropdown-item {{ Request::is('offer/create') ? 'text-white active' : null }}" href="{{ route('create-advertisement') }}" title="{{ trans('offer.offer-create-poland')}}">{{ trans('offer.offer-create-poland')}} <span class="btn btn-rounded btn-success btn-sm"><i class="fas fa-plus-circle"></i></span></a>
                                <a class="side-nav dropdown-item {{ Request::is('user/foreigns') ? 'text-white active' : null }}" href="{{ route('user-foreign-list') }}" title="{{ trans('offer.user-foreigns')}}">{{ trans('offer.user-foreigns')}}</a>
                                <a class="side-nav dropdown-item {{ Request::is('foreign/create') ? 'text-white active' : null }}" href="{{ route('create-foreign') }}" title="{{ trans('offer.offer-create-foreign')}}">{{ trans('offer.offer-create-foreign')}} <span class="btn btn-rounded btn-success btn-sm"><i class="fas fa-plus-circle"></i></span></a>
                                <a class="side-nav dropdown-item {{ Request::is('user/courses') ? 'text-white active' : null }}" href="{{ route('user-course-list') }}" title="{{ trans('profile.user-courses')}}">{{ trans('profile.user-courses')}}</a>
                                <a class="side-nav dropdown-item {{ Request::is('user/courses/create') ? 'text-white active' : null }}" href="{{ route('create-course') }}" title="{{ trans('buttons.btn-add') }} {{ trans('sentence.courses') }}">{{ trans('buttons.btn-add') }} <span class="text-lowercase">{{ trans('sentence.courses') }} <span class="btn btn-rounded btn-success btn-sm"><i class="fas fa-plus-circle"></i></span></span></a>
                            @endif

                            @if(auth()->user()->hasRole('admin'))
                                <a class="side-nav dropdown-item {{ Request::is('admin/watch-visitors') ? 'text-white active' : null }}" href="{{ route('watch-visitors-on-map') }}" title="{{ trans('sentence.visitors-list') }}">{{ trans('sentence.visitors-list') }}</a>
                            @endif
                            <a class="side-nav dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                title="{{ trans('sentence.logout')}}">
                                {{ trans('sentence.logout')}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <a href="https://www.facebook.com/EmployMed" class="nav-link lang-dropdown {{ $theme . '-theme' }}" title="EmployMed Facebook site">
                        <img src="{{asset('images/facebook.png')}}" width="30" height="30" alt="Dołącz do nas na facebooku">    
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>