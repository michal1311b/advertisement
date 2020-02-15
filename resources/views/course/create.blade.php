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
            <div class="card">
                <div class="card-header">{{ trans('sentence.register-course') }}</div>
                
                @error('message')
                    <div class="alert alert-danger }}">{!! $message !!}</div>
                @enderror 
                <course-create 
                :states="{{ $states }}"
                :locations="{{ $locations }}"
                :specializations="{{ $specializations }}"
                :currencies="{{ $currencies }}"></course-create>
            </div>
        </div>
    </div>
</div>
@endsection
