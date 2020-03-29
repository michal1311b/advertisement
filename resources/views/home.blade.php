@extends('layouts.app')


@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('home') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('sentence.dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ trans('sentence.login-message') }}

                    <ul class="navbar-nav mx-auto">
                        @if(auth()->user()->hasRole('doctor') || auth()->user()->hasRole('nurse'))
                            <li class="nav-item home-page">
                                <a href="{{ route('user-prefered-locations') }}" class="nav-link lang-dropdown" title="{{ trans('sentence.your-preferences')}}">{{ trans('sentence.your-preferences')}}</a>
                            </li>
                        @endif
                            <li class="nav-item home-page">
                                <a class="nav-link lang-dropdown" href="{{ route('edit-user', auth()->user()->id) }}" title="{{ trans('profile.user-profile')}}">{{ trans('profile.user-profile')}}</a>
                            </li>
                            <li class="nav-item home-page">   
                                <a class="nav-link lang-dropdown" href="{{ route('user-rooms') }}" title="{{ trans('profile.user-message')}}">{{ trans('profile.user-message')}}</a>
                            </li>
                            <li class="nav-item home-page">
                                <a class="nav-link lang-dropdown" href="{{ route('advertisement-list') }}" title="{{ trans('offer.offers-list')}}">{{ trans('offer.offers-list')}}</a>
                            </li>
                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('company'))
                                <li class="nav-item home-page">    
                                    <a class="nav-link lang-dropdown" href="{{ route('user-advertisement-list') }}" title="{{ trans('offer.user-offers')}}">{{ trans('offer.user-offers')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('create-advertisement') }}" title="{{ trans('offer.offer-create-poland')}}">{{ trans('offer.offer-create-poland')}} <span class="btn btn-rounded btn-success btn-sm"><i class="fas fa-plus-circle"></i></span></a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('user-foreign-list') }}" title="{{ trans('offer.user-foreigns')}}">{{ trans('offer.user-foreigns')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('create-foreign') }}" title="{{ trans('offer.offer-create-foreign')}}">{{ trans('offer.offer-create-foreign')}} <span class="btn btn-rounded btn-success btn-sm"><i class="fas fa-plus-circle"></i></span></a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('user-course-list') }}" title="{{ trans('profile.user-courses')}}">{{ trans('profile.user-courses')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('create-course') }}" title="{{ trans('buttons.btn-add') }} {{ trans('sentence.courses') }}">{{ trans('buttons.btn-add') }} <span class="text-lowercase">{{ trans('sentence.courses') }} <span class="btn btn-rounded btn-success btn-sm"><i class="fas fa-plus-circle"></i></span></span></a>
                                </li>
                            @endif

                            @if(auth()->user()->hasRole('admin'))
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('watch-visitors-on-map') }}" title="{{ trans('sentence.visitors-list') }}">{{ trans('sentence.visitors-list') }}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('users.list') }}" title="{{ trans('sentence.user-list')}}">{{ trans('sentence.user-list')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('categories.index') }}" title="{{ trans('sentence.category-list')}}">{{ trans('sentence.category-list')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('posts.index') }}" title="{{ trans('sentence.posts-list')}}">{{ trans('sentence.posts-list')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('pages.index') }}" title="{{ trans('sentence.pages-list')}}">{{ trans('sentence.pages-list')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('newsletters.index') }}" title="{{ trans('email.newsletters-list')}}">{{ trans('email.newsletters-list')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('mailinglists.index') }}" title="{{ trans('email.mailinglist-list')}}">{{ trans('email.mailinglist-list')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('recipients.index') }}" title="{{ trans('email.recipients-list')}}">{{ trans('email.recipients-list')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('mailTracker_Index') }}" title="{{ trans('email.email-tracker')}}">{{ trans('email.email-tracker')}}</a>
                                </li>
                                <li class="nav-item home-page">
                                    <a class="nav-link lang-dropdown" href="{{ route('preview-list') }}" title="{{ trans('preview.list')}}">{{ trans('preview.list')}}</a>
                                </li>
                            @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
