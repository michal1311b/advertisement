<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" class="w-100 logo" alt="EmployMed Logo"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @php $locale = session()->get('locale'); @endphp
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ trans('sentence.language')}} <span class="caret"></span>
                    </a>
                    @switch($locale)
                        @case('pl')
                        <img src="{{asset('images/pl.png')}}" width="20px" height="20x"> {{ trans('sentence.polish')}}
                        @break
                        @default
                        <img src="{{asset('images/uk.png')}}" width="20px" height="20x"> {{ trans('sentence.english')}}
                    @endswitch
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('locale', 'en') }}"><img src="{{asset('images/uk.png')}}" width="20px" height="20x"> {{ trans('sentence.english')}}</a>
                        <a class="dropdown-item" href="{{ route('locale', 'pl') }}"><img src="{{asset('images/pl.png')}}" width="20px" height="20x"> {{ trans('sentence.polish')}}</a>
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ trans('sentence.login')}}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ trans('sentence.register')}}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle notification" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span>{{ __('Inbox') }}</span>
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
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('edit-user', auth()->user()->id) }}">{{ trans('sentence.user-profile')}}</a>
                            <a class="dropdown-item" href="{{ route('user-rooms') }}">{{ trans('sentence.user-message')}}</a>
                            @if(auth()->user()->hasRole('doctor'))
                                <a class="dropdown-item" href="{{ route('user-prefered-locations') }}">{{ trans('sentence.your-preferences')}}</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('advertisement-list') }}">{{ trans('sentence.offers-list')}}</a>
                            
                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('company'))
                                <a class="dropdown-item" href="{{ route('user-advertisement-list') }}">{{ trans('sentence.user-offers')}}</a>
                                <a class="dropdown-item" href="{{ route('create-advertisement') }}">{{ trans('sentence.offer-create')}}</a>
                            @endif

                            @if(auth()->user()->hasRole('admin'))
                            <a class="dropdown-item" href="{{ route('users.list') }}">{{ trans('sentence.user-list')}}</a>
                                <a class="dropdown-item" href="{{ route('categories.create') }}">{{ trans('sentence.category-create')}}</a>
                                <a class="dropdown-item" href="{{ route('categories.index') }}">{{ trans('sentence.category-list')}}</a>
                                <a class="dropdown-item" href="{{ route('posts.create') }}">{{ trans('sentence.post-create')}}</a>
                                <a class="dropdown-item" href="{{ route('posts.index') }}">{{ trans('sentence.posts-list')}}</a>
                                <a class="dropdown-item" href="{{ route('pages.create') }}">{{ trans('sentence.pages-create')}}</a>
                                <a class="dropdown-item" href="{{ route('pages.index') }}">{{ trans('sentence.pages-list')}}</a>
                                <a class="dropdown-item" href="{{ route('mailTracker_Index') }}">{{ trans('sentence.email-tracker')}}</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ trans('sentence.logout')}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>