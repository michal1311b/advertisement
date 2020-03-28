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
                <div class="card-header">{{ trans('sentence.register') }}</div>
                
                @error('message')
                    <div class="alert alert-danger }}">{!! $message !!}</div>
                @enderror
                <company-register 
                :works="{{ $works }}" 
                :states="{{ $states }}"
                :locations="{{ $locations }}"
                :specializations="{{ $specializations }}"
                :currencies="{{ $currencies }}"
                :settlements="{{ $settlements }}"></company-register>
               
                <div class="col-12 col-md-6">
                    <div class="body embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/kSkjnHSg2yY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
