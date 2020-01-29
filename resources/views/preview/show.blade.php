@extends('layouts.app')

@section('title')
    {{ $preview->title }}
@endsection

@section('description')
    {{ $preview->location }}, {{ $preview->salary }}, {{ $preview->type }}
@endsection

@section('breadcrumbs')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {!! Breadcrumbs::render('preview-article', $preview) !!}
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
                <div class="card-header">{{ trans('sentence.offer-show') }} <strong>{{ $preview->title }}</strong></div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.company_name') }}
                                        <span class="badge badge-pill">{{ $preview->company }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.city') }}
                                        <span class="badge badge-pill">{{ $preview->location }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.created_at') }}
                                        <span class="badge badge-pill">{{ $preview->created_at }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.settlement') }}
                                        <span class="badge badge-pill">{{ $preview->type }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ trans('sentence.salary') }}
                                        <span class="badge badge-pill">{{ $preview->salary }}</span>
                                    </li>
                                </ul>

                                <div class="py-2">
                                    <h4><strong>{{ trans('sentence.description') }}</strong></h4>
                                    {!! $preview->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 pb-3">
                                <h1 class="text-danger">
                                    {{ trans('sentence.preview-header') }}
                                </h1>

                                <h6>{{ trans('sentence.preview-post-offer') }}</h6>
                            </div>
                            <div class="col-12 pb-3">
                                <p>{{ trans('sentence.preview-source') }} <strong>{{ $preview->source }}</strong>, <a href="{{ $preview->link }}">{{ trans('sentence.preview-source-link') }}</a></a></p>
                            </div>
                            <div class="col-12 text-center">
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
</div>
@endsection

@section('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc7278fb46e12ce"></script>
@endsection