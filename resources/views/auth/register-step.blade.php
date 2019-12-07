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
                    <div class="row">
                        <div class="col-12 col-md-6 pb-2 text-center">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                                {{ trans('sentence.register') }} {{ trans('sentence.as') }} {{ trans('sentence.doctor') }}/{{ trans('sentence.dentist') }}
                            </a>
                        </div>
                        <div class="col-12 col-md-6 pb-2 text-center">
                            <a href="{{ route('register.company') }}" class="btn btn-primary btn-lg">
                                {{ trans('sentence.register') }} {{ trans('sentence.as') }} {{ trans('sentence.company') }} {{ trans('sentence.and') }} {{ trans('sentence.offer-create') }}
                            </a>
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