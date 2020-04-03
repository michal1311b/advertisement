@extends('layouts.site')

@section('title')
    {{ trans('sentence.register-step') }}
@endsection

@section('description')
    {{ trans('sentence.register-step') }}
@endsection

@section('breadcrumbs')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            {!! Breadcrumbs::render('site.register-step') !!}
        </div>
    </div>	
</div>
@endsection

@section('content')
<div class="container pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('sentence.register-step') }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6 pb-2">
                                <div class="section">
                                    <div class="columns">
                                        <div class="column is-4 is-offset-4">
                                            <div class="cart">
                                                <div class="header">
                                                    <div class="avatar">
                                                        <img class="logo" src="{{ asset('images/poland.png') }}" alt="{{ trans('sentence.polish') }}">
                                                    </div>
                                                </div>
                                                <div class="cart-body">
                                                    <div class="user-bio has-text-centered">
                                                    <p>
                                                        {{ trans('sentence.register') }} 
                                                        {{ trans('sentence.as') }} 
                                                        {{ trans('company.company') }} 
                                                        {{ trans('sentence.and') }} 
                                                        {{ trans('offer.offer-create-poland') }}
                                                    </p>
                                                    </div>
                                                    <div class="action has-text-centered">
                                                        <a href="{{ route('register.company') }}" class="button is-small" 
                                                        title="{{ trans('sentence.register') }} {{ trans('sentence.as') }} {{ trans('company.company') }} {{ trans('sentence.and') }} {{ trans('offer.offer-create-poland') }}">
                                                            {{ trans('sentence.register') }} 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pb-2">
                                <div class="section">
                                    <div class="columns">
                                        <div class="column is-4 is-offset-4">
                                            <div class="cart">
                                                <div class="header">
                                                    <div class="avatar">
                                                        <img class="logo" src="{{ asset('images/globe.png') }}" alt="{{ trans('sentence.polish') }}">
                                                    </div>
                                                </div>
                                                <div class="cart-body">
                                                    <div class="user-bio has-text-centered">
                                                        <p>
                                                            {{ trans('sentence.register') }} 
                                                            {{ trans('sentence.as') }} 
                                                            {{ trans('company.company') }} 
                                                            {{ trans('sentence.and') }} 
                                                            {{ trans('offer.offer-create-foreign') }}
                                                        </p>
                                                    </div>
                                                    <div class="action has-text-centered">
                                                        <a href="{{ route('register.foreign') }}" class="button is-small" 
                                                        title="{{ trans('sentence.register') }} {{ trans('sentence.as') }} {{ trans('company.company') }} {{ trans('sentence.and') }} {{ trans('offer.offer-create-poland') }}">
                                                            {{ trans('sentence.register') }} 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 pb-2">
                                <div class="section">
                                    <div class="columns">
                                        <div class="column is-4 is-offset-4">
                                            <div class="cart">
                                                <div class="header">
                                                    <div class="avatar">
                                                        <img class="logo" src="{{ asset('images/stuff3.png') }}" alt="{{ trans('sentence.polish') }}">
                                                    </div>
                                                </div>
                                                <div class="cart-body">
                                                    <div class="user-bio has-text-centered">
                                                        <p>
                                                            {{ trans('sentence.register') }} 
                                                            {{ trans('sentence.as') }} 
                                                            {{ trans('profile.doctor') }}/ 
                                                            {{ trans('profile.dentist') }}/ 
                                                            {{ trans('profile.nurse') }}
                                                        </p>
                                                    </div>
                                                    <div class="action has-text-centered">
                                                        <a href="{{ route('register') }}" class="button is-small" 
                                                        title="{{ trans('sentence.register') }} {{ trans('sentence.as') }} {{ trans('profile.doctor') }}/ {{ trans('profile.dentist') }}/ {{ trans('profile.nurse') }}">
                                                            {{ trans('sentence.register') }} 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 pb-2">
                                <div class="section">
                                    <div class="columns">
                                        <div class="column is-4 is-offset-4">
                                            <div class="cart">
                                                <div class="header">
                                                    <div class="avatar">
                                                        <img class="logo" src="{{ asset('images/course-icon.png') }}" alt="{{ trans('sentence.polish') }}">
                                                    </div>
                                                </div>
                                                <div class="cart-body">
                                                    <div class="user-bio has-text-centered">
                                                        <p>
                                                            {{ trans('sentence.register') }} 
                                                            {{ trans('sentence.as') }} 
                                                            {{ trans('company.company') }} 
                                                            {{ trans('sentence.and') }} 
                                                            {{ trans('sentence.register-course') }}
                                                        </p>
                                                    </div>
                                                    <div class="action has-text-centered">
                                                        <a href="{{ route('register.course') }}" class="button is-small" 
                                                            title="{{ trans('sentence.register') }} {{ trans('sentence.as') }} {{ trans('company.company') }} {{ trans('sentence.and') }} {{ trans('sentence.register-course') }}">
                                                            {{ trans('sentence.register') }} 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection