@extends('layouts.app')

@section('title')
    {{ trans('company.register-company') }}
@endsection

@section('description')
    {{ trans('company.register-company') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.validation-errors')
        </div>
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="avatar">
                        <img class="logo" src="{{ asset('images/globe.png') }}" alt="{{ trans('sentence.polish') }}">
                        {{ trans('sentence.register') }}
                    </div>
                </div>
                
                @error('message')
                    <div class="alert alert-danger }}">{!! $message !!}</div>
                @enderror
                <foreign-register 
                :works="{{ $works }}" 
                :specializations="{{ $specializations }}"
                :currencies="{{ $currencies }}"
                :settlements="{{ $settlements }}"></foreign-register>
            </div>
        </div>
    </div>
</div>
@endsection
