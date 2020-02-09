@extends('layouts.app')

@section('css')
<style>
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
</style>
@endsection

@section('title')
    
@endsection

@section('description')
    
@endsection

@section('breadcrumbs')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {!! Breadcrumbs::render('participant-info', $participant) !!}
            </div>
        </div>	
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('sentence.offer-show') }} <strong>{{ $participant->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.first_name') }}
                                        <span class="badge badge-pill">{{ $participant->first_name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.last_name') }}
                                        <span class="badge badge-pill">{{ $participant->last_name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.city') }}
                                        <span class="badge badge-pill">{{ $participant->city }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.street') }}
                                        <span class="badge badge-pill">{{ $participant->street }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.phone') }}
                                        <span class="badge badge-pill">{{ $participant->phone }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.company_name') }}
                                        <span class="badge badge-pill">{{ $participant->company_name ?? null }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.company_street') }}
                                        <span class="badge badge-pill">{{ $participant->company_street ?? null }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.company_post_code') }}
                                        <span class="badge badge-pill">{{ $participant->company_post_code ?? null }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.company_city') }}
                                        <span class="badge badge-pill">{{ $participant->company_city ?? null }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.company_nip') }}
                                        <span class="badge badge-pill">{{ $participant->company_nip ?? null }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.company_phone') }}
                                        <span class="badge badge-pill">{{ $participant->company_phone ?? null }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 pt-2">
                                <div>{{ trans('sentence.comments') }}</div>
                                <div>{{ $participant->comments ?? null }}</div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
@endsection