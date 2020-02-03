@extends('layouts.app')

@section('title')
    {{ trans('sentence.register-company') }}
@endsection

@section('description')
    {{ trans('sentence.register-company') }}
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
                <div class="px-2 py-2 text-danger font-weight-bold">
                    {!! trans('sentence.download-helper-info') !!}
                    <p>
                        <a href="{{ asset('documents/EmployMed_wzór_formularza.docx') }}" download>
                            <img src="{{ asset('images/word-icon.png') }}" alt="Microsoft Word" class="logo"/>
                        </a>
                    </p>
                </div>   

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
                <company-register 
                :works="{{ $works }}" 
                :states="{{ $states }}"
                :locations="{{ $locations }}"
                :specializations="{{ $specializations }}"
                :currencies="{{ $currencies }}"
                :settlements="{{ $settlements }}"></company-register>
                <p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/erveMcgLb90" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
