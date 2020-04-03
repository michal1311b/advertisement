@extends('layouts.app')

@section('title')
    {{ trans('sentence.register-doctor') }}
@endsection

@section('description')
    {{ trans('sentence.register-doctor') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="avatar">
                        <img class="logo" src="{{ asset('images/stuff3.png') }}" alt="{{ trans('sentence.polish') }}">
                        {{ trans('sentence.register') }}
                    </div>
                </div>
                
                @error('message')
                    <div class="alert alert-danger }}">{!! $message !!}</div>
                @enderror
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="doctor-tab" data-toggle="tab" href="#doctor" role="tab" aria-controls="doctor" aria-selected="true">{{ trans('profile.doctor') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dentist-tab" data-toggle="tab" href="#dentist" role="tab" aria-controls="dentist" aria-selected="true">{{ trans('profile.dentist') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nurse-tab" data-toggle="tab" href="#nurse" role="tab" aria-controls="nurse" aria-selected="true">{{ trans('profile.nurse') }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    @include('auth.users.doctor')
                    @include('auth.users.dentist')
                    @include('auth.users.nurse')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
