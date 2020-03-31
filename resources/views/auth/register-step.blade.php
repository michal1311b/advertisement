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
                                <a href="{{ route('register.company') }}" class="btn btn-rounded btn-primary btn-lg">
                                    {{ trans('sentence.register') }} 
                                    {{ trans('sentence.as') }} 
                                    {{ trans('company.company') }} 
                                    {{ trans('sentence.and') }} 
                                    {{ trans('offer.offer-create-poland') }}
                                    <img class="logo" src="{{ asset('images/poland.png') }}" alt="{{ trans('sentence.polish') }}">
                                </a>
                            </div>
                            <div class="col-12 col-md-6 pb-2">
                                <a href="{{ route('register.foreign') }}" class="btn btn-rounded btn-primary btn-lg">
                                    {{ trans('sentence.register') }} 
                                    {{ trans('sentence.as') }} 
                                    {{ trans('company.company') }} 
                                    {{ trans('sentence.and') }} 
                                    {{ trans('offer.offer-create-foreign') }}
                                    <img class="logo" src="{{ asset('images/globe.png') }}" alt="{{ trans('sentence.polish') }}">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 pb-2 text-center">
                                <a href="{{ route('register') }}" class="btn btn-rounded btn-primary btn-lg">
                                    {{ trans('sentence.register') }} 
                                    {{ trans('sentence.as') }} 
                                    {{ trans('profile.doctor') }}/ 
                                    {{ trans('profile.dentist') }}/ 
                                    {{ trans('profile.nurse') }}
                                    <img class="logo" src="{{ asset('images/stuff3.png') }}" alt="{{ trans('sentence.polish') }}">
                                </a>
                            </div>
                            <div class="col-12 col-md-6 pb-2 text-center">
                                <a href="{{ route('register.course') }}" class="btn btn-rounded btn-primary btn-lg">
                                    {{ trans('sentence.register') }} 
                                    {{ trans('sentence.as') }} 
                                    {{ trans('company.company') }} 
                                    {{ trans('sentence.and') }} 
                                    {{ trans('sentence.register-course') }}
                                    <img class="logo" src="{{ asset('images/course-icon.png') }}" alt="{{ trans('sentence.register-course') }}">
                                </a>
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