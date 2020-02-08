@extends('layouts.app')

@section('title')
    {{ trans('sentence.register-course') }}
@endsection

@section('description')
    {{ trans('sentence.register-course') }}
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
                <div class="card-header">{{ trans('sentence.register-course') }}</div>
                
                @error('message')
                    <div class="alert alert-danger }}">{!! $message !!}</div>
                @enderror 

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link step1 active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">{{ trans('sentence.step1') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link step2" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">{{ trans('sentence.step2') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link step3" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">{{ trans('sentence.step3') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link step4" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="false">{{ trans('sentence.step4') }}</a>
                    </li>
                </ul>
                <course-register 
                :states="{{ $states }}"
                :locations="{{ $locations }}"
                :specializations="{{ $specializations }}"
                :currencies="{{ $currencies }}"></course-register>
            </div>
        </div>
    </div>
</div>
@endsection
